
@extends('admin.layouts.app')   
@section('title')
    Tables 
@endsection
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-2" >
                            <div class="col-lg-12" >
                                <button class="btn btn-primary ladda-button i-add" id="create-data" data-style="expand-right" data-url = '' data-prefix = '{{$prefix}}' data-type = "create"><span class="ladda-label">Add Table</span></button> 
                            </div>
                        </div>
                    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{createHeaderTitle($prefix)}}</h4>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 200px"></th>
                                                <th>ID</th>
                                                <th>Table ID</th>
                                                <th>Table Name</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableRecord">
                                            @forelse ($records as $record)
                                                <tr>
                                                    <th scope="row"><button class="btn btn-danger i-design">Design</button> <button class="btn btn-success i-edit" data-id="{{encryptHelper($record->id)}}" onclick="buildTable(this)">Build</button> </th>
                                                    <td>{{$record->id}}</td>
                                                    <td>{{$record->table_id}}</td>
                                                    <td>{{$record->table_name}}</td>
                                                    <td>{{$record->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="5">No Record Found</td>
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
        $(document).on('click','.m-confirm-submit',function(e){
            let code = $(this).data('code');
            
           
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