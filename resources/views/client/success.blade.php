@extends('client.template')
<style>
    .qrcode_c{
        width: 300px;
        height: 200px;
        /* display: flex;
        justify-content: center;
        align-items: center ; */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%)
    }
</style>
@section('content')
    <div class="qrcode_c">
      
        <div id="qrcode"></div>
        <br> <br>
        <h5>Show this QR code to our cashier or provide the order code [ <b>{{$random_code}}</b> ] below.</h5> 
    </div>
    
   
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            Swal.fire({
            title: "Success ",
            text: "Your Order Create",
            icon: "success"
            });
        });

        var qrcode = new QRCode("qrcode", {
            text: "{{$random_code}}",
            width: 200,
            height: 200,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
@endsection