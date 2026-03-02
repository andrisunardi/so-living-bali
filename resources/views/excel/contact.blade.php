<table>
    <thead>
        <tr>
            <th align="center" colspan="11">
                <b>{{ trans('page.contact') }}</b>
            </th>
        </tr>
        <td colspan="11"></td>
        </tr>
        <tr>
            <th align="center" colspan="11">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="11"></td>
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
                <b>{{ trans('field.company') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.email') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.phone') }}</b>
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
        @forelse ($contacts as $contact)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $contact->id }}
                </td>
                <td valign="middle" align="center">
                    {{ $contact->code }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->company }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->email }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->phone }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->updatedBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $contact->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="11">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="11"></td>
        </tr>
    </tfoot>
</table>
