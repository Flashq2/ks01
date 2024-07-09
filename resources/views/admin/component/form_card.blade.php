<form class="form" id="formData">
    <input type="hidden" name="is_code" id="is_code" value="{{ isset($record) ? $record[$primary_key] : ''}}">
    <div class="row">
        <?php $validate_icon = '<small style="color: red">*</small>'?>
        @foreach ($fields as $item)
            @if($item->field_type !='text-editor')
                @if ($item->field_type == 'text')
                    @if ($item->filed_name == 'inactived')
                        <div class="col-lg-6">
                            <div class="mb-10">
                                <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                                <select class="form-select custome_select2" data-control="select2"
                                    data-placeholder="Select an option" name="{{ $item->filed_name }}"
                                    id="{{ $item->filed_name }}" data-dropdown-parent="#m-modal" >
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
                                    placeholder="{{ $item->filed_name }}" 
                                    maxlength="{{ $item->max_lenght }}"
                                    name="{{ $item->filed_name }}"
                                    {{$item->readonly == 'yes' ? 'readonly' : ''}}
                                    value="{{ isset($record[$item->filed_name]) ? format_number($record[$item->filed_name],$item->format) : '' }}" />
                            </div>
                        </div>
                    @endif
                @elseif($item->field_type == 'select2')
                    <div class="col-lg-6">
                        <div class="mb-10">
                            <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                        <select class="form-select select2-hidden-accessible" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                            data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                            data-table = "{{$item->table_relate}}"
                            data-primary_field = "{{$item->table_code_relate}}"
                            data-description_field = "{{$item->table_description_relate}}"
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
                            <label for="{{ $item->filed_name }}" class="required form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                            <select class="form-select select2-hidden-accessible" data-select2-id="{{ $item->filed_name }}" tabindex="-1" aria-hidden="true"
                                data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}" name="{{ $item->filed_name }}"
                                data-table = "{{$item->table_relate}}"
                                data-primary_field = "{{$item->table_code_relate}}"
                                data-description_field = "{{$item->table_description_relate}}"
                                id="{{ $item->filed_name }}">
                            @if(isset($record))
                                <option  value="{{ $record[$item->filed_name] ?? '' }}" selected>  {{ $record[$item->filed_name] ?? '' }}</option>
                            @endif
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
                @elseif($item->field_type == 'date')
                    <div class="col-lg-6">
                        <div class="mb-10">
                            <label for="{{ $item->filed_name }}" class="form-label">{{ createHeaderTitle($item->filed_name) }} {!!$item->on_validate == 'yes' ? $validate_icon : ''!!}</label>
                            <input type="text" class="form-control padding_form" id="{{ $item->filed_name }}"
                                placeholder="{{ $item->filed_name }}" maxlength="{{ $item->max_lenght }}"
                                name="{{ $item->filed_name }}"
                                {{$item->readonly == 'yes' ? 'readonly' : ''}}
                                data-date-format="dd M, yyyy" data-provide="datepicker" data-date-container='#{{ $item->filed_name }}'
                                value="{{ format_number($record[$item->filed_name],$item->format)?? '' }}" />
                        </div>
                    </div>
                @endif
            @else
         
            @endif
        @endforeach
       
    </div>
    <br>
    {{-- @if(App\MainSystem\system::HasColumn($prefix,'remark'))
        <div class="row">
            <div class="col-lg-12">
                <textarea name="remark" id="remark" value = "{!! $record['remark'] !!}">{!! $record['remark'] !!}</textarea>
            </div>
        </div>
    @endif --}}
</form>