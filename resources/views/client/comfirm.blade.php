@extends('client.template')
@section('content')
   
	<section class="gap">
		<div class="container">
			<div class="row">
                <div class="text">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Order No" id="orderNo">
                        <div class="input-group-append">
                          <span class="input-group-text blue" id="comfirm-code">Comfirm</span>
                        </div>
                      </div>
                </div>
			
				{{-- <div class="offset-xl-1 col-xl-6 col-lg-12" data-aos="flip-up" data-aos-delay="300"
					data-aos-duration="400">
					<form class="checkout-form" action="{{url("success")}}" method="POST">
						@csrf
						<h4>Buyer information</h4>
						<input type="text" name="Name" placeholder="Full Name" value="{{$user->name}}">
						<div class="row">
							<div class="col-lg-6">
								<input type="text" name="email" placeholder="E-mail" value="{{$user->email}}">
							</div>
							<div class="col-lg-6">
								<input type="text" name="phone" placeholder="Phone" value="{{$user->phone_no}}">
							</div>
                            <div class="col-lg-6">
								<input type="text" name="arrived_time" placeholder="Arrived Time" value="">
							</div>
						</div>
						<button class="button-price">Comfirm</button>
					</form>
				</div> --}}
			</div>
            <div class="row" id="detail">

            </div>
		</div>
	</section>
	<!-- footer -->
 
@endsection 


@section('script')
    <script>
        $(document).ready(function () {
            $("#comfirm-code").on("click",function(){
                let code = $('#orderNo').val() ;
                $.ajax({
                    type: "GET",
                    url: "/admin/comfirm-order/search",
                    data: {
                        code
                    },
                    success: function (response) {
                        $("#detail").html(response.view)  ;
                    }
                });
            });
        });
    </script>
@endsection