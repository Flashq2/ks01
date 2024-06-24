@extends('admin.layouts.app')
@section('title')
    User
@endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success ladda-button" data-prefix = "/{{$prefix}}" onclick="updateData(this)"><span class="ladda-label">Updates</span></button>
                        <button class="btn btn-info ladda-button " onclick="configTelegramId(this)"><span class="ladda-label"><i class="fab fa-telegram-plane"></i> Telegram Bot</span></button>
                        {{-- <button class="btn btn-{{$record['two_authentiacation'] == 'no' ? 'warning' : 'danger'}} ladda-button " id="update-2fa" data-type = '{{$record['two_authentiacation']}}' onclick="update2FA(this)"><span class="ladda-label">
                            <i class="fas fa-user-lock"></i> </span> 
                            <span class="lable-text">
                                {{$record['two_authentiacation'] == 'no' ? 'Enable 2 Factor Authentication' : ' Disabled 2 Factor Authentication'}}
                            </span> 
                        </button> --}}
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
                                            <img class="round" src="{{$record['picture_ori'] ?? ''}}" alt="user" />
                                            <h3>{{$record['name']}}</h3>
                                            <h6>{{$record['address']}}</h6>
                                            
                                            <div class="skills">
                                                <h6>Role</h6>
                                                <ul>
                                                    
                                                    <li>Student</li>
                                                    <li>Desinger</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @include('admin.component.action.button_upload_image',['page' => 'User' ,'primary_key' => $record['id']])
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


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Lexa <span class="d-none d-sm-inline-block"> Pok Puthea </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
@section('script')
<script>
</script>
@endsection
