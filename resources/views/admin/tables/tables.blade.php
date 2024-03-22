
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
                                <button class="btn btn-primary ladda-button i-add" id="create-data" data-style="expand-right"><span class="ladda-label">Add Table</span></button> 
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table Data</h4>
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
                                        <tbody>
                                            @forelse ($records as $record)
                                                <tr>
                                                    <th scope="row"><button class="btn btn-danger i-design">Design</button> <button class="btn btn-success i-edit">Edit</button></th>
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
         initializingTL.TLloading()
    </script>
@endsection