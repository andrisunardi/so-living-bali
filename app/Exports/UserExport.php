<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Role;

class UserExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public string $roleId = '';

    public array $isActive = [];

    public object $users;

    public ?Role $role = null;

    public function __construct(
        string $roleId,
        array $isActive,
        object $users,
    ) {
        $this->role = Role::find($roleId);
        $this->roleId = $roleId;
        $this->isActive = $isActive;
        $this->users = $users;
    }

    public function view(): View
    {
        return view('excel.user', [
            'role' => $this->role,
            'roleId' => $this->roleId,
            'isActive' => $this->isActive,
            'users' => $this->users,
        ]);
    }
}
