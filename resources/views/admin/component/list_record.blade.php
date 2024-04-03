<tr id="id_{{$record->$primary_key}}">
    @if (!isset($excel))
        <th  scope="row"><button
                class="btn btn-danger i-delete" data-prefix = "{{$prefix}}" data-code="{{$record->$primary_key}}" onclick="prepareDelete(this)">Delete</button>
            <button class="btn btn-success i-edit" data-id="{{ encryptHelper($record->id) }}"data-url = '{{$page_url}}&{{encryptHelper($record->id)}}' data-prefix = '{{ $prefix }}'
                data-type = "edit" onclick="getModalEditData(this)">Edit</button>
        </th>
    @endif
    @foreach ($fields as $item)
        <?php $page_id = $item->filed_name; ?>
        <td>{{ $record->$page_id }}</td>
    @endforeach
</tr>