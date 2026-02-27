<table>
    <thead>
        <tr>
            <th align="center" colspan="7">
                <b>{{ trans('page.property') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th align="center" colspan="7">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.code') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.address') }}</b>
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
        @forelse ($properties as $property)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $property->id }}
                </td>
                <td valign="middle" align="center">
                    {{ $property->code }}
                </td>
                <td valign="middle">
                    {{ $property->name }}
                </td>
                <td valign="middle">
                    {{ $property->address }}
                </td>
                <td valign="middle">
                    {{ $property->created_at }}
                </td>
                <td valign="middle">
                    {{ $property->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="7">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7"></td>
        </tr>
    </tfoot>
</table>
