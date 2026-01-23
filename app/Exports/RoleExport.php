<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Permission;

class RoleExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public string $permissionId = '';

    public object $roles;

    public ?Permission $permission = null;

    public function __construct(
        string $permissionId,
        object $roles,
    ) {
        $this->permission = Permission::find($permissionId);
        $this->permissionId = $permissionId;
        $this->roles = $roles;
    }

    public function view(): View
    {
        return view('excel.role', [
            'permissionId' => $this->permissionId,
            'roles' => $this->roles,
        ]);
    }
}
