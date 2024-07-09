<style>
    .table-input-field>:not(caption)>*>* {
        padding: 4px !important;
    }

    .table-input-field [class^='select2'] {
        border: none;
        border-radius: 0px !important;
    }

    .table-input-field input {
        border: none;
        border-radius: 0px !important;
    }
</style>

<div class="card">
    <div class="card-body">
        <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
            <div class="table-responsive">
                <table class="table table-input-field" id="TableOfTable" style="width: 1500px;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Table ID</th>
                            <th scope="col">Table Name</th>
                            <th scope="col">Field ID</th>
                            <th scope="col">Field Name </th>
                            <th scope="col">Field Type </th>
                            <th scope="col">On Validate </th>
                            <th scope="col">Hide</th>
                            <th scope="col">Format</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $i = 0; 
                          $fomates = [
                            'text','decimal','quantity','amount'
                          ]
                        ?>
                        @foreach ($table_field as $field)
                            <tr>
                                <th scope="row">{{ $i += 1 }}</th>
                                <td>{{ $field->table_id }}</td>
                                <td>{{ $field->table_name }}</td>
                                <td>{{ $field->field_id }}</td>
                                <td>{{ $field->filed_name }}</td>
                                <td>{{ $field->field_type }}</td>
                                <td>
                                    <select class="form-select select2-custome select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true"
                                        onchange="settingTableList(this)"
                                        data-table_id = '{{$field->table_id}}'
                                        data-field_id = '{{$field->field_id}}'
                                        data-list_name = 'on_validate'
                                            >
                                        <option value="yes" {{ $field->on_validate == 'yes' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="no" {{ $field->on_validate == 'no' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select select2-custome select2-hidden-accessible" tabindex="-1"
                                        aria-hidden="true" onchange="settingTableList(this)"
                                        data-table_id = '{{$field->table_id}}'
                                        data-field_id = '{{$field->field_id}}'
                                        data-list_name = 'hide'
                                        >
                                        <option value="yes" {{ $field->hide == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ $field->hide == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </td>
                                <td>
                                  <select class="form-select select2-custome select2-hidden-accessible" tabindex="-1"
                                      aria-hidden="true" onchange="settingTableList(this)"
                                      data-table_id = '{{$field->table_id}}'
                                      data-field_id = '{{$field->field_id}}'
                                      data-list_name = 'format'
                                      >
                                      @foreach ($fomates as $fomate)
                                        <option value="{{$fomate}}" {{ $field->format == $fomate ? 'selected' : '' }}>{{createHeaderTitle($fomate)}}</option>
                                      @endforeach
                                      
                                  </select>
                              </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
