
@extends('admin.layouts.app')   
@section('title')
    Tables ss
@endsection
@section('content')
    <div class="main-content">
        
        
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                              ...
                            <option value="WY">Wyoming</option>
                          </select>
                        <div class="row mb-2" >
                            <div class="col-lg-12" >
                                <button class="btn btn-primary ladda-button i-add" id="create-data" data-style="expand-right" data-url = '' data-prefix = '{{$prefix}}' data-type = "create"><span class="ladda-label">Add Table</span></button> 
                            </div>
                        </div>
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$page}}</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 200px"></th>
                                                @foreach ($fields as $item)
                                                    <th>{{createHeaderTitle($item->filed_name)}}</th>
                                                @endforeach
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="tableRecord">
                                            @forelse ($records as $record)
                                                <tr>
                                                    <th scope="row"><button class="btn btn-danger i-design">Delete</button> <button class="btn btn-success i-edit" data-id="{{encryptHelper($record->id)}}" onclick="buildTable(this)">Build</button> </th>
                                                    @foreach ($fields as $item)
                                                        <?php $page_id = $item->filed_name ?>
                                                        <td>{{$record->$page_id}}</td>
                                                    @endforeach
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="{{count($fields) + 1}}">No Record Found</td>
                                                </tr>
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->   

            </div> <!-- container-fluid -->
        </div>


        <!-- End Page-content -->
      
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                          <script>document.write(new Date().getFullYear())</script> Pok Puthea</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('script')
    <script>
        const prefix = "{{$prefix}}";
        $('.js-example-basic-multiple').select2();
        $(document).on('click','.m-confirm-submit',function(e){
            let code = $(this).data('code');
        })
        $(document).on('change','#table_name',function(){
            $('#table_id').val('') ;
            $('#table_id').val($(this).val().trim()) ;
        })
        function buildTable(ctrl){
            let code = $(ctrl).attr('data-id');
            let data ={
                code : code,
            }
            $.ajax({
                type: "POST",
                url: `${prefix}/build-table`,
                data:data,
                success: function (response) {
                   if(response.status == 'success'){
                        notyf.success(response.msg);
                    }else{
                        notyf.error(response.msg);
                    }
                }
            });
        }

        // initializingTL.TLSelect2LiveSearch('system/select2-live-search','table_names')
    </script>
@endsection