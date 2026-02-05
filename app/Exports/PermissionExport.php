<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Role;

class PermissionExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public string $roleId = '';

    public object $permissions;

    public ?Role $role = null;

    public function __construct(
        string $roleId,
        object $permissions,
    ) {
        $this->role = Role::find($roleId);
        $this->roleId = $roleId;
        $this->permissions = $permissions;
    }

    public function view(): View
    {
        return view('excel.permission', [
            'roleId' => $this->roleId,
            'role' => $this->role,
            'permissions' => $this->permissions,
        ]);
    }
}
