<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>Permission</b>
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th align="center" colspan="8">
                Printed Date : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>#</b>
            </th>
            <th valign="middle" align="center">
                <b>ID</b>
            </th>
            <th valign="middle" align="center">
                <b>Name</b>
            </th>
            <th valign="middle" align="center">
                <b>Guard Name</b>
            </th>
            <th valign="middle" align="center">
                <b>Total Role</b>
            </th>
            <th valign="middle" align="center">
                <b>Total User</b>
            </th>
            <th valign="middle" align="center">
                <b>Created At</b>
            </th>
            <th valign="middle" align="center">
                <b>Updated At</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($permissions as $permission)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->id }}
                </td>
                <td valign="middle">
                    {{ $permission->name }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->guard_name }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->roles_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->users_count }}
                </td>
                <td valign="middle">
                    {{ $permission->created_at }}
                </td>
                <td valign="middle">
                    {{ $permission->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="8">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"></td>
        </tr>
    </tfoot>
</table>
