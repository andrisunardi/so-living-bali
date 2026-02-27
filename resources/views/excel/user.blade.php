<table>
    <thead>
        <tr>
            <th align="center" colspan="14">
                <b>User</b>
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <th align="center" colspan="14">
                Printed Date : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
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
                <b>Email</b>
            </th>
            <th valign="middle" align="center">
                <b>Phone</b>
            </th>
            <th valign="middle" align="center">
                <b>Username</b>
            </th>
            <th valign="middle" align="center">
                <b>Active</b>
            </th>
            <th valign="middle" align="center">
                <b>Roles</b>
            </th>
            <th valign="middle" align="center">
                <b>Total Role</b>
            </th>
            <th valign="middle" align="center">
                <b>Total Permission</b>
            </th>
            <th valign="middle" align="center">
                <b>Created By</b>
            </th>
            <th valign="middle" align="center">
                <b>Updated By</b>
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
        @forelse ($users as $user)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->id }}
                </td>
                <td valign="middle">
                    {{ $user->name }}
                </td>
                <td valign="middle">
                    {{ $user->email }}
                </td>
                <td valign="middle">
                    '{{ $user->phone }}
                </td>
                <td valign="middle">
                    {{ $user->username }}
                </td>
                <td valign="middle" align="center">
                    {{ Str::yesNo($user->is_active) }}
                </td>
                <td valign="middle">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->roles_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->permissions_count }}
                </td>
                <td valign="middle">
                    {{ $user->createdBy?->name }}
                </td>
                <td valign="middle">
                    {{ $user->updatedBy?->name }}
                </td>
                <td valign="middle">
                    {{ $user->created_at }}
                </td>
                <td valign="middle">
                    {{ $user->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="14">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="14"></td>
        </tr>
    </tfoot>
</table>
