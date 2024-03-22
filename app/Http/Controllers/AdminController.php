<?php

namespace App\Http\Controllers;


use App\Exports\UserExport;
use App\Models\User;
use App\Models\UserCheck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function AdminDashboard()
    {
        $alladmin = User::where('role', 'admin')->get();
        return view('admin.index', compact('alladmin'));
        // return view('admin.index');
    }
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename; // Set photo attribute directly on $data
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Update Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'confirmed'
            ]
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

        // Update password
        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function AllAdmin()
    {
        $alladmin = User::where('role', 'admin')->get();
        return view('backend.pages.admin.all_admin', compact('alladmin'));
    }

    public function CheckUser()
    {
        $checkUser = UserCheck::where('role', 'admin')->get();
        return view('backend.pages.admin.check_user', compact('checkUser'));
    }


    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    }


    public function EditAdmin($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user', 'roles'));
    }

    public function EditUserCheck($id)
    {
        $user = UserCheck::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_check', compact('user', 'roles'));
    }
    public function StoreAdmin(Request $request)
    {
        // Log request data for debugging
        logger($request->all());

        // Validation
        $validatedData = $request->validate([
            'username' => 'nullable|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|unique:users',
            'address' => 'nullable',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
        ], [
            'password.regex' => 'The password must be at least 8 characters long and contain at least 2 uppercase letters, 1 number, and 1 symbol.',
        ]);

        $creator = Auth::user();

        // Save user to database
        $user = new UserCheck();
        $user->username = $validatedData['username'] ?? null;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'] ?? null;
        $user->address = $validatedData['address'] ?? null;
        $user->created_by = $creator ? $creator->name : 'Anonymous';
        $user->created_date = Carbon::now();
        $user->password = Hash::make($validatedData['password']);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'User  Created Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
    }


    public function ApproveUser($id)
    {
        // Retrieve the user details from the UserCheck table
        $userCheck = UserCheck::findOrFail($id);

        $approver = Auth::user();

        // Create a new user record in the users table
        $user = User::create([
            'username' => $userCheck->username,
            'name' => $userCheck->name,
            'email' => $userCheck->email,
            'phone' => $userCheck->phone,
            'address' => $userCheck->address,
            'created_by' => $userCheck->created_by,
            'approved_by' => $approver ? $approver->name : 'Anonymous',
            'created_date' => $userCheck->created_date,
            'approved_at' => Carbon::now(),
            'password' => $userCheck->password,
            'role' => $userCheck->role,
            'status' => $userCheck->status,
        ]);

        // Assign roles to the newly created user
        if ($userCheck->roles()->count() > 0) {
            foreach ($userCheck->roles as $role) {
                $user->assignRole($role->name);
            }
        }

        // Delete the user from the UserCheck table
        $userCheck->delete();

        // Set success notification
        $notification = [
            'message' => 'User Approved Successfully',
            'alert-type' => 'success',
        ];

        // Redirect back with success message
        return redirect()->back()->with($notification);
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'User Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function UpdateUserCheck(Request $request, $id)
    {
        $user = UserCheck::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'User Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('check.user')->with($notification);
    }


    public function DeleteAdmin($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message' => 'User Delete Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function DeleteCheck($id)
    {
        $user = UserCheck::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message' => 'User Delete Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }




    public function ResetPassword($id)
    {
        $profileData1 = User::findOrFail($id);
        return view('backend.pages.admin.reset_admin', compact('profileData1'));
    }

    public function UpdatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        $notification = array(
            'message' => 'User Reset password Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('all.admin')->with($notification);
    }


    // detail admin
    public function DetailAdmin($id)
    {
        $profileData1 = User::findOrFail($id);
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.detail_user', compact('user', 'roles', 'profileData1'));
    }
    // Export User
    public function ExportUser()
    {
        return Excel::download(new UserExport, 'AllUser.xlsx');
    }
}
