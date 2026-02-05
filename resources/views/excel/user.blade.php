<table>
    <thead>
        <tr>
            <th align="center" colspan="10">
                <b>{{ trans('page.user') }}</b>
            </th>
        </tr>
        @if ($role)
            <tr>
                <th align="center" colspan="10">
                    {{ trans('page.role') }} : {{ $role->name }}
                </th>
            </tr>
        @endif
        @if ($isActive)
            <tr>
                <th align="center" colspan="10">
                    {{ trans('field.active') }} :
                    {{ collect($isActive)->map(fn($v) => $v ? 'Yes' : 'No')->implode(', ') }}
                </th>
            </tr>
        @endif
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <th align="center" colspan="10">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="10"></td>
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
                <b>{{ trans('field.email') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.phone') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.username') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.active') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.roles') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.property') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created_at') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.updated_at') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.roles') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.property') }}</b>
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
                <td valign="middle" align="left">
                    {{ $user->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->email }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->phone }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->username }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->is_active ? 'Yes' : 'No' }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->properties_count }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->updated_at }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->properties_count }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="10">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10"></td>
        </tr>
    </tfoot>
</table>
