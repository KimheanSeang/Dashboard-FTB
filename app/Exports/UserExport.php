<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        // Fetch users along with their roles
        return User::with('roles')->get()->map(function ($user) {
            return [
                'Name' => $user->name,
                'NiceName' => $user->username,
                'Email' => $user->email,
                'Phone' => $user->phone,
                'Address' => $user->address,
                'Created By' => $user->created_by,
                'Approved By' => $user->approved_by,
                'Created Date' => $user->created_date,
                'Approve Date' => $user->approved_at,
                'Roles' => $user->roles->implode('name', ', '), // Get roles as comma-separated string
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Name',
            'NiceName',
            'Email',
            'Phone',
            'Address',
            'Created By',
            'Approved By',
            'Created Date',
            'Approve Date',
            'Roles',
        ];
    }
}