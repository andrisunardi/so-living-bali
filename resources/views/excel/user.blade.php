<table>
    <thead>
        <tr>
            <th align="center" colspan="15">
                <b>{{ trans('page.user') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
        </tr>
        <tr>
            <th align="center" colspan="15">
                {{ trans('index.printed_date') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="15"></td>
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
                <b>{{ trans('field.is_active') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.roles') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.property') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.role') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.permission') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.created_by') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.updated_by') }}</b>
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
                    '{{ $user->phone }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->username }}
                </td>
                <td valign="middle" align="center">
                    {{ Str::yesNo($user->is_active) }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->properties_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->roles_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $user->permissions_count }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->updatedBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $user->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="15">No Data Available</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="15"></td>
        </tr>
    </tfoot>
</table>
