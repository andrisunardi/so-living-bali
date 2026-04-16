<table>
    <thead>
        <tr>
            <th align="center" colspan="14">
                <b>{{ trans('page.concept') }}</b>
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <th align="center" colspan="14">
                {{ trans('field.printed_at') }} : {{ now()->isoFormat('LLLL') }}
            </th>
        </tr>
        <tr>
            <td colspan="14"></td>
        </tr>
        <tr>
            <th valign="middle" align="center">
                <b>{{ trans('field.#') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.title') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.title_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.title_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.description') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.description_id') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.description_zh') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.icon') }}</b>
            </th>
            <th valign="middle" align="center">
                <b>{{ trans('field.active') }}</b>
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
        @forelse ($concepts as $concept)
            <tr>
                <td valign="middle" align="center">
                    {{ $loop->iteration }}
                </td>
                <td valign="middle" align="center">
                    {{ $concept->id }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->title }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->title_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->title_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->description }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->description_id }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->description_zh }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->icon }}
                </td>
                <td valign="middle" align="center">
                    {{ Str::yesNo($concept->is_active) }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->createdBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->updatedBy?->name }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->created_at }}
                </td>
                <td valign="middle" align="left">
                    {{ $concept->updated_at }}
                </td>
            </tr>
        @empty
            <tr>
                <td align="center" colspan="14">
                    {{ trans('message.no_data_available') }}
                </td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="14"></td>
        </tr>
    </tfoot>
</table>
