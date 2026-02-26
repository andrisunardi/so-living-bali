<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('page.area') }}</b>
            </th>
        </tr>
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
                <b>{{ trans('field.district_id') }}</b>
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
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.property') }}</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($areas as $area)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $area->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $area->district?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $area->name }}
                </td>
                <td valign="middle" align="center">
                    {{ $area->is_active ? 'Yes' : 'No' }}
                </td>
                <td valign="middle" align="left">
                    {{ $area->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $area->updated_at }}
                </td>
                <td valign="middle" align="center">
                    0
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
