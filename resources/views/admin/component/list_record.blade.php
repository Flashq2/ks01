
<?php 
    $exclude_field = ['picture_ori'] ;
    $all_fields = $fields->pluck('filed_name')->toArray();
?>

@if(isset($excel))
    @foreach ($fields as $item)
        <?php   $field_name = $item->filed_name;  ?>
        <td style="width: 100px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $record->$field_name }}</td>
    @endforeach
@else
    <tr id="id_{{$record->$primary_key}}" style="white-space: nowrap;">
        <td  scope="row"><button
            class="btn btn-danger i-delete" data-prefix = "{{$prefix}}" data-code="{{$record->$primary_key}}" onclick="prepareDelete(this)">Delete</button>
        <button class="btn btn-success i-edit" data-id="{{ encryptHelper($record->id) }}"data-url = '{{isset($page_url) ? $page_url.''.encryptHelper($record->$primary_key) : ''}}' data-prefix = '{{ $prefix }}'
            data-type = "edit" onclick="getModalEditData(this)">Edit</button>
            {{-- <img class="rounded-circle header-profile-user" src="/images/users/user-4.jpg" alt="Header Avatar"> --}}
        @if(in_array('picture_ori',$all_fields))
            <img class="rounded-circle header-profile-user" src="{{$record->picture_ori}}" alt="Header Avatar" onclick="preUploadImage(this)" data-page = '{{$prefix}}' data-code="{{$record->$primary_key}}">
        @endif
        </td>
        @foreach ($fields as $item)
            <?php   $field_name = $item->filed_name;  ?>
            <td style="width: 100px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $record->$field_name }}</td>
        @endforeach
    </tr>
@endif