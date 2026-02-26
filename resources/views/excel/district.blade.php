<table>
    <thead>
        <tr>
            <th align="center" colspan="6">
                <b>{{ trans('page.district') }}</b>
            </th>
        </tr>
        @if ($isActive)
            <tr>
                <th align="center" colspan="6">
                    {{ trans('field.active') }} :
                    {{ collect($isActive)->map(fn($v) => $v ? 'Yes' : 'No')->implode(', ') }}
                </th>
            </tr>
        @endif
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <th align="center" colspan="6">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="6"></td>
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
                <b>{{ trans('field.active') }}</b>
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
        @forelse ($districts as $district)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $district->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $district->name }}
                </td>
                <td valign="middle" align="center">
                    {{ $district->is_active ? 'Yes' : 'No' }}
                </td>
                <td valign="middle" align="left">
                    {{ $district->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $district->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="6">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"></td>
        </tr>
    </tfoot>
</table>
