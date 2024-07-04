@extends('admin.layouts.app')
@section('title')
    systemPageTitle
@endsection

@section('style')
@endsection
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success ladda-button" data-prefix = "/{{$prefix}}" onclick="updateData(this)"><span class="ladda-label">Updates</span></button>
                        <button class="btn btn-info ladda-button " onclick="configTelegramId(this)"><span class="ladda-label"><i class="fab fa-telegram-plane"></i> Telegram Bot</span></button>
                         
                    </div>
                </div>
                <br>
                <div class="row">
                   
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-container">
                                            <img class="round" src="{{asset('images/users/user-3.jpg')}}" alt="user" />
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-9">
                                <div class="card">
                                    <div class="card-body">
                                            @include('admin.component.form_card')
                                    </div>  

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
       @include('admin.component.footer')
    </div>
@endsection
@section('script')
<script>
</script>
@endsection
