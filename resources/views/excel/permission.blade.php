<table>
    <thead>
        <tr>
            <th align="center" colspan="9">
                <b>{{ trans('page.permission') }}</b>
            </th>
        </tr>
        @if ($role)
            <tr>
                <th align="center" colspan="9">
                    {{ trans('page.role') }} : {{ $role->name }}
                </th>
            </tr>
        @endif
        <tr>
            <td colspan="9"></td>
        </tr>
        <tr>
            <th align="center" colspan="9">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="9"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.guard_name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.roles') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.permission') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.user') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created_at') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.updated_at') }}</b>
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
                <td valign="middle" align="left">
                    {{ $permission->name }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->guard_name }}
                </td>
                <td valign="middle" align="left">
                    {{ $permission->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->roles_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $permission->users_count }}
                </td>
                <td valign="middle" align="left">
                    {{ $permission->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $permission->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="9">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9"></td>
        </tr>
    </tfoot>
</table>
