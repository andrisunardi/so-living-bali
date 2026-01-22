<table>
    <thead>
        <tr>
            <th align="center" colspan="8">
                <b>{{ trans('page.contact') }}</b>
            </th>
        </tr>
        @if ($startDate)
            <tr>
                <th align="center" colspan="8">
                    {{ trans('field.start_date') }} : {{ Date::parse($startDate)->isoFormat('LL') }}
                </th>
            </tr>
        @endif
        @if ($endDate)
            <tr>
                <th align="center" colspan="8">
                    {{ trans('field.end_date') }} : {{ Date::parse($endDate)->isoFormat('LL') }}
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
                <b>{{ trans('field.created_at') }}</b>
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
                <td valign="middle">
                    {{ $contact->name }}
                </td>
                <td valign="middle">
                    {{ $contact->company }}
                </td>
                <td valign="middle">
                    {{ $contact->email }}
                </td>
                <td valign="middle">
                    {{ $contact->phone }}
                </td>
                <td valign="middle">
                    {{ $contact->created_at }}
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
