<div class="row">
    <div class="col-12">
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <H6 class="text-primary">Adcance Search</H6>
                <form class="form" id="formDataAdvance">
                    <input type="hidden" name="is_code" id="is_code" value="{{ $code ?? '' }}">
                    <div class="row">
                        <?php $validate_icon = '<small style="color: red">*</small>'; ?>

                        @foreach ($fields as $item)
                            @if ($item->field_type == 'text')
                                @if ($item->filed_name == 'inactived')
                                    <div class="col-lg-6">
                                        <div class="mb-10">
                                            <label for="{{ $item->filed_name }}"
                                                class="required form-label">{{ createHeaderTitle($item->filed_name) }}
                                                {!! $item->on_validate == 'yes' ? $validate_icon : '' !!}</label>
                                            <select
                                                class="form-select select2-custome select2-hidden-accessible"
                                                data-select2-id="{{ $item->filed_name }}"
                                                tabindex="-1" aria-hidden="true"
                                                data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}"
                                                name="{{ $item->filed_name }}"
                                                id="{{ $item->filed_name }}">
                                                <option
                                                    {{ isset($record['inactived']) && $record['inactived'] == 'no' ? 'selected' : '' }}
                                                    value="no">No</option>
                                                <option
                                                    {{ isset($record['inactived']) && $record['inactived'] == 'yes' ? 'selected' : '' }}
                                                    value="yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-6">
                                        <div class="mb-10">
                                            <label for="{{ $item->filed_name }}"
                                                class="form-label">{{ createHeaderTitle($item->filed_name) }}
                                                {!! $item->on_validate == 'yes' ? $validate_icon : '' !!}</label>
                                            <input type="text" class="form-control padding_form"
                                                id="{{ $item->filed_name }}"
                                                placeholder="{{ $item->filed_name }}"
                                                maxlength="{{ $item->max_lenght }}"
                                                name="{{ $item->filed_name }}"
                                                {{ $item->readonly == 'yes' ? 'readonly' : '' }}
                                                value="{{ $record[$item->filed_name] ?? '' }}" />
                                        </div>
                                    </div>
                                @endif
                            @elseif($item->field_type == 'select2')
                                <div class="col-lg-6">
                                    <div class="mb-10">
                                        <label for="{{ $item->filed_name }}"
                                            class="required form-label">{{ createHeaderTitle($item->filed_name) }}
                                            {!! $item->on_validate == 'yes' ? $validate_icon : '' !!}</label>
                                        <select class="form-select select2-hidden-accessible"
                                            data-select2-id="{{ $item->filed_name }}"
                                            tabindex="-1" aria-hidden="true"
                                            data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}"
                                            name="{{ $item->filed_name }}"
                                            data-table = "{{ $item->table_relate }}"
                                            data-primary_field = "{{ $item->table_code_relate }}"
                                            data-description_field = "{{ $item->table_description_relate }}"
                                            id="{{ $item->filed_name }}">
                                            <?php
                                            $data_record = \DB::table($item->table_relate)->get();
                                            $primary = $item->table_code_relate;
                                            $description = $item->table_description_relate;
                                            ?>
                                            @foreach ($data_record as $data)
                                                <option value="{{ $data->$primary }}"
                                                    {{ isset($record[$data->$primary]) && $record[$data->$primary] == $data->$primary ? 'selected' : '' }}>
                                                    {{ $data->$description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @elseif($item->field_type == 'live_search')
                                <div class="col-lg-6">
                                    <div class="mb-10">
                                        <label for="{{ $item->filed_name }}"
                                            class="required form-label">{{ createHeaderTitle($item->filed_name) }}
                                            {!! $item->on_validate == 'yes' ? $validate_icon : '' !!}</label>
                                        <select class="form-select select2-hidden-accessible"
                                            data-select2-id="{{ $item->filed_name }}"
                                            tabindex="-1" aria-hidden="true"
                                            data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}"
                                            name="{{ $item->filed_name }}"
                                            data-table = "{{ $item->table_relate }}"
                                            data-primary_field = "{{ $item->table_code_relate }}"
                                            data-description_field = "{{ $item->table_description_relate }}"
                                            id="{{ $item->filed_name }}">

                                        </select>
                                    </div>
                                </div>
                            @elseif($item->field_type == 'option')
                                <?php $options = explode(',', $item->option_value); ?>
                                <div class="col-lg-6">
                                    <div class="mb-10">
                                        <label for="{{ $item->filed_name }}"
                                            class="required form-label">{{ createHeaderTitle($item->filed_name) }}
                                            {!! $item->on_validate == 'yes' ? $validate_icon : '' !!}</label>
                                        <select class="form-select select2-custome"
                                            data-select2-id="{{ $item->filed_name }}"
                                            tabindex="-1" aria-hidden="true"
                                            data-placeholder="Select {{ createHeaderTitle($item->filed_name) }}"
                                            name="{{ $item->filed_name }}"
                                            id="{{ $item->filed_name }}">
                                            <option value=" ">&nbsp;</option>
                                            @foreach ($options as $option)
                                                <option value="{{ $option }}">
                                                    {{ createHeaderTitle($option) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </form>
                <div class="row">
                    <div class="col-12 mt-2">
                        <span class="badge bg-success">You can setup your schedule for export this data to email or telegram !</span> <br><br>
                        <button class="btn btn-primary ladda-button" data-prefix = '{{ $prefix }}' onclick="searchData(this)"><span class="ladda-label">Search</span></button>
                        <button class="btn btn-outline-danger ladda-button" data-prefix = '{{ $prefix }}' onclick="exportAndSearch(this)"><span class="ladda-label">Scheduling Export Excel</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>