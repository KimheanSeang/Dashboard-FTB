<?php



namespace App\Http\Controllers\Auth; // Corrected namespace

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // This method overrides the default username used by Laravel for authentication.
    public function username()
    {
        return 'phone'; // Assuming 'phone' is the field used for phone numbers in your database.
    }

    // This method validates the user's login request.
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required', // The phone number field is required.
            'password' => 'required', // The password field is required.
        ]);
    }

    // This method attempts to log in the user.
    protected function attemptLogin(Request $request)
    {
        // Retrieve the credentials from the request
        $credentials = $request->only($this->username(), 'password');

        // Add additional condition to check if the user is active
        $credentials['active'] = true;

        // Attempt to authenticate the user
        return Auth::attempt($credentials, $request->filled('remember'));
    }
}
