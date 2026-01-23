<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('page.user') }}</b>
            </th>
        </tr>
        @if ($role)
            <tr>
                <th align="center" colspan="8">
                    {{ trans('field.role') }} : {{ $role->name }}
                </th>
            </tr>
        @endif
        @if ($isActive)
            <tr>
                <th align="center" colspan="8">
                    {{ trans('field.active') }} :
                    {{ collect($isActive)->map(fn($v) => $v ? 'Yes' : 'No')->implode(', ') }}
                </th>
            </tr>
        @endif
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th align="center" colspan="8">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="8"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.roles') }}</b>
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
                <b>{{ trans('field.created_at') }}</b>
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
                <td valign="middle" align="center">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle">
                    {{ $user->name }}
                </td>
                <td valign="middle">
                    {{ $user->email }}
                </td>
                <td valign="middle">
                    {{ $user->phone }}
                </td>
                <td valign="middle">
                    {{ $user->username }}
                </td>
                <td valign="middle">
                    {{ $user->created_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="8">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8"></td>
        </tr>
    </tfoot>
</table>
