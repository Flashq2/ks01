
<table class="table">
    <thead>
        <tr>
            @if (!isset($excel))
                <th style="width: 200px"></th>
            @endif
            @foreach ($fields as $item)
                <th>{{ createHeaderTitle($item->filed_name) }}</th>
            @endforeach

        </tr>
    </thead>
    <tbody id="tableRecord">
        @forelse ($records as $record)
            @include('admin.component.list_record')
        @empty
            <tr> <td class="text-center" colspan="{{ count($fields) + 1 }}">No Record Found</td></tr>
        @endforelse
    </tbody>
</table>
@if (!isset($excel)) {{ $records->links('pagination::bootstrap-5') }} @endif