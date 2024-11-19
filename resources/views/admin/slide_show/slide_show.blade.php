@extends('admin.layouts.app')
@section('title')
    systemPageTitle
@endsection
@section('style')
    <style>
        .drag-image {
            border: 1px dashed #91ace5;
            height: 250px;
            width: 100%;
            border-radius: 5px;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .drag-image.active {
            border: 2px solid #91ace5;
        }

        .drag-image .icon {
            font-size: 30px;
            color: #91ace5;
        }

        .drag-image h6 {
            font-size: 20px;
            font-weight: 300;
            color: #91ace5;
        }

        .drag-image span {
            font-size: 14px;
            font-weight: 300;
            color: #91ace5;
            margin: 10px 0 15px 0;
        }

        .drag-image button {
            padding: 10px 25px;
            font-size: 14px;
            font-weight: 300;
            border: none;
            outline: none;
            background: transparent;
            color: #91ace5;
            border: 1px solid #91ace5;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.5s;
        }

        .drag-image button:hover {
            background-color: #256088;
            color: white;
        }

        .drag-image img {
            width: 100%;
            height: 70%;
            object-fit: contain;
        }

        .list-img {
            width: 100px !important;
            height: 100px !important;
            object-fit: contain !important;
        }

        .control-table {
            overflow: auto !important;
        }

        .table_list_imge {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;

        }
        .table_list_imge img {
            width: 100%;
            height: 100%;
            object-fit: contain;

        }

        .delete_image {
            background: #853939;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-8">

                                        <div class="dropdown dropdown-topbar pt-3 mt-1 d-inline-block">
                                            <a class="btn  btn-info dropdown-toggle" href="#" role="button"
                                                id="dropdownAction" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action <i class="mdi mdi-chevron-down"></i>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                                <a class="dropdown-item" href="#" data-prefix = "{{ $prefix }}"
                                                    onclick="exportExcell(this,event)">DownLoad Excel</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-prefix = "{{ $prefix }}"
                                                    onclick="prepareUpload(this,event)">Upload Excel</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-prefix = "{{ $prefix }}"
                                                    onclick="printData(this,event)">Print as PDF</a>
                                                <div class="dropdown-divider a-primary"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <form class="app-search">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <span class="fa fa-search"></span>
                                                <i class="fa fa-filter" data-bs-toggle="collapse" href="#collapseExample"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collapseExample"></i>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.component.advanceSearch')
                        <div class="card">
                            <div class="card-body">
                                Slide Show
                                <div class="row append_file">
                                    <div class="col-2">
                                        <div class="drag-image">
                                            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                            <h6>Add new Image</h6>
                                            <button class="btn-browse">Browse File</button>
                                            <form action="" id="formimg" enctype="multipart/form-data">
                                                <input type="file" hidden class="upload-item" name="file"
                                                    id="file">
                                                <input type="text" hidden name="code" id="code"
                                                    value="Slide Show">
                                            </form>

                                        </div>
                                    </div>
                                    @if (isset($records))
                                        @foreach ($records as $item)
                                            <div class="col-2 row_{{ $item->id }}">
                                                <div class="drag-image ">
                                                    <img src="{{ $item->picture_ori }}" alt="">
                                                    <div class="btn delete_image" data-id ='{{ $item->id }}'>Remove
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

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
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Pok Puthea</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('script')
    <script>
        const prefix = "{{ $prefix }}";
        $(document).ready(function() {
            $("#imageModal").modal('show');
            $(".table").tableFixer({
                "head": false,
                "left": 1
            });
            initializingTL.TLSelect2('inactived');
            $(document).on('click', '.m-confirm-submit', function(e) {
                let code = $(this).data('code');
            })
            $(document).on('click', '.btn-browse', function() {
                $('.upload-item').trigger('click');
            });
            $(document).on('change', '#file', function() {
                let file = $('#file').val();
                let data = new FormData(formimg);
                $.ajax({
                    type: "POST",
                    url: `/${prefix}/UploadImage`,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('.append_file').append(`
                            <div class="col-2 row_${response.id}">
                                <div class="drag-image ">
                                <img src="${response.path}" alt="">
                                <div class="btn delete_image" data-id="${response.id}">Remove</div>
                                </div>
                            </div>
                        
                        `)
                        notyf.success(response.msg);
                    }
                });
            });
            $(document).on('click', '.delete_image', function() {
                    let id = $(this).attr('data-id');
                    console.log(id) ;
                    $.ajax({
                        type: "POST",
                        url: `/${prefix}/Deleteimage`,
                        data: {
                            'id' : id 
                        },
                        success: function(response) {
                            $(`.row_${id}`).remove()
                            notyf.success(response.msg);
                        }
                    });
                });
        });
    </script>
@endsection
