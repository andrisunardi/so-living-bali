<table>
    <thead>
        <tr>
            <th align="center" colspan="12">
                <b>{{ trans('page.district') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="12"></td>
        </tr>
        <tr>
            <th align="center" colspan="12">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="12"></td>
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
                <b>{{ trans('field.show') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.active') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.area') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.contact') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('index.total') }} {{ trans('page.property') }}</b>
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
                    {{ Str::yesNo($district->is_show) }}
                </td>
                <td valign="middle" align="center">
                    {{ Str::yesNo($district->is_active) }}
                </td>
                <td valign="middle" align="center">
                    {{ $district->areas_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $district->contacts_count }}
                </td>
                <td valign="middle" align="center">
                    {{ $district->properties_count }}
                </td>
                <td valign="middle" align="left">
                    {{ $district->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $district->updatedBy?->name }}
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
                <td align="center" colspan="12">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="12"></td>
        </tr>
    </tfoot>
</table>
