<table>
    <thead>
        <tr>
            <th align="center" colspan="10">
                <b>{{ trans('page.property_image') }}</b>
            </th>
        </tr>
        <tr>
            <th align="center" colspan="10">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.property_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.name') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.description') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.image_url') }}</b>
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
        @forelse ($propertyImages as $propertyImage)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $propertyImage->id }}
                </td>
                <td valign="middle" align="center">
                    {{ $propertyImage->property?->code }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->google_file_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->image_url }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->updatedBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $propertyImage->updated_at }}
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
