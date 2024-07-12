
<style>
    .custome-bg-info{
        background: rgb(172 225 240) !important;
        padding: 10px;
        border-left-color: #eef2ff ;
        border-left: 5px solid #125deb ;
    }
</style>
<div class="modal-dialog {{$modal_size}} modal-dialog-centered" role="dialog">
    <div class="modal-content ">
        <div class="modal-header" style="background: #eef2ff;">
            @if(isset($record))
                <h5 class="modal-title">Edit {{$page}} ({{ $record[$primary_key] }}) </h5>
            @else
                <h5 class="modal-title">Create {{$page}}</h5>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            @if(isset($has_info))
                <div class="row">
                    <div class="col-12">
                        <div class="custome-bg-info">
                            {{$has_info['data']}}
                        </div>
                    </div>
                </div> 
                <br>
            @endif
            <form class="form" id="formData">
                <input type="hidden" name="is_code" id="is_code" value="{{ isset($record) ? $record[$primary_key] : ''}}">
                <div class="row">
                    <?php $validate_icon = '<small style="color: red">*</small>'?>
                    @foreach ($fields as $item)
                        @if ($item->field_type == 'text')
                            @if ($item->filed_name == 'inactived')
                                <div class="col-lg-6">
                                    <div class="mb-10">
                                        <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                        <select class="form-select select2-custome" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                                            data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                                            id="{{ $item->filed_name }}" >
                                            <option {{(isset($record['inactived'])  &&  $record['inactived'] == 'no' ? 'selected' : '')}}  value="no">No</option>
                                            <option {{(isset($record['inactived'])  &&  $record['inactived'] == 'yes' ? 'selected' : '')}}  value="yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6">
                                    <div class="mb-10">
                                        <label for="{{ $item->filed_name }}" class="form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                        <input type="text" class="form-control padding_form" id="{{ $item->filed_name }}"
                                            placeholder="{{ $item->filed_name }}" maxlength="{{ $item->max_lenght }}"
                                            name="{{ $item->filed_name }}"
                                            {{$item->readonly == 'yes' ? 'readonly' : ''}}
                                            value="{{ $record[$item->filed_name] ?? '' }}" />
                                    </div>
                                </div>
                            @endif
                        @elseif($item->field_type == 'select2')
                            <div class="col-lg-6">
                                <div class="mb-10">
                                    <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                <select class="form-select select2-custome" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                                    data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                                    id="{{ $item->filed_name }}">
                                    <?php
                                        $data_record = \DB::table($item->table_relate)->get();
                                        $primary = $item->table_code_relate;
                                        $description = $item->table_description_relate
                                    ?>
                                    @foreach ($data_record as $data)
                                             <option value="{{$data->$primary}}" {{(isset($record[$data->$primary])  &&  $record[$data->$primary] == $data->$primary ? 'selected' : '')}}>{{$data->$description}}</option>
                                         @endforeach
                                </select>
                                </div>
                            </div>
                        @elseif($item->field_type == 'live_search')
                        <div class="col-lg-6">
                            <div class="mb-10">
                                <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }}  {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                <select class="form-select select2-hidden-accessible" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                                    data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                                    data-table = "{{$item->table_relate}}"
                                    data-primary_field = "{{$item->table_code_relate}}"
                                    data-description_field = "{{$item->table_description_relate}}"
                                    id="{{ $item->filed_name }}">
                                  @if(isset($record))
                                    <option  value="{{ $record[$item->filed_name] ?? '' }}" selected>  {{ $record[$item->filed_name] ?? '' }}</option>
                                  @endif
                                  <option  value="{{ $record[$item->filed_name] ?? '' }}" selected>  {{ $record[$item->filed_name] ?? '' }}</option>
                                </select>
                            </div>
                        </div>
                        @elseif($item->field_type == 'option')
                        <?php $options = explode(',',$item->option_value) ?>
                            <div class="col-lg-6">
                                <div class="mb-10">
                                    <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                    <select class="form-select select2-custome" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                                        data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                                        id="{{ $item->filed_name }}">
                                        @if(isset($record))
                                        <option  value="{{ $record[$item->filed_name] ?? '' }}" selected>  {{ $record[$item->filed_name] ?? '' }}</option>
                                        @endif
                                        @foreach ($options as $option)
                                            <option value="{{$option}}" >{{ createHeaderTitle($option) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>

            </form>
        </div>
        <div class="modal-footer">
            @if(isset($record))
                <button type="button" class="btn btn-success" data-prefix = "{{$prefix}}" onclick="updateData(this)">Update</button>
            @else
                <button type="button" class="btn btn-success" data-prefix = "{{$prefix}}" onclick="saveData(this)">Save</button>
            @endif
           
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>