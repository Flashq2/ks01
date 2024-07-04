@extends('admin.layouts.app')
@section('title')
    Item Card
@endsection

@section('style')
  
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success ladda-button" data-prefix = "/{{$prefix}}" onclick="updateData(this)" data-code = "{{ isset($record) ? $record[$primary_key] : ''}}"><span class="ladda-label">Updates</span></button>
                        <button class="btn btn-info ladda-button" data-prefix = "/{{$prefix}}" onclick="publishItem(this)" data-code = "{{ isset($record) ? $record[$primary_key] : ''}}"><i class="fab fa-safari"></i> <span class="ladda-label">Publish To Web</span></button>
                        <button class="btn btn-success ladda-button" data-prefix = "/{{$prefix}}" onclick="updateData(this)" data-code = "{{ isset($record) ? $record[$primary_key] : ''}}"><i class="fas fa-image"></i> <span class="ladda-label">Add Image</span></button>
                        <button class="btn btn-outline-dark ladda-button" data-prefix = "/{{$prefix}}" onclick="updateData(this)" data-code = "{{ isset($record) ? $record[$primary_key] : ''}}"><i class="far fa-list-alt"></i> <span class="ladda-label">More ...</span></button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    @include('admin.component.form_card')
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.component.footer')
    </div>

    <div class="modal fade" aria-labelledby="divPublishImage" aria-hidden="true" id="divPublishImage" role="dialog">
        @include('admin.items.publish_to_ecom_modal')
   </div>
@endsection
@section('script')
<script>
    const prefix = "{{$prefix ?? ''}}";
    const url = {
        'pre_publish' : `/${prefix}/pre-publish-item`
    }
    function publishItem(ctrl){
        let code = $(ctrl).attr('data-code');
        let data = {
            code : code
        }
        $.ajax({
            type: "GET",
            url: `${url['pre_publish']}`,
            data : data ,
            success: function (response) {
                $('#divPublishImage').modal('show');
            }
        });
       
    }
</script>
@endsection
