@extends('client.template')
@section('content')
   
	<section class="gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
					<div class="checkout-order">
						<div class="title-checkout">
							<h2>Your order:</h2>
							<h6>{{count($order)}}</h6>
						</div>
						<div class="banner-wilmington">
							<img alt="logo" src="https://via.placeholder.com/50x50">
							<h6>Kennington Lane Cafe</h6>
						</div>
						<ul>
                            <?php $total = 0; ?>
							 @foreach ($order as $or)

                             <?php 
                                $it = $items->where("no",$or->item_no)->first() ;
                                if(!$it) continue ;
                                $description = $it->description ;
                                $unit_price = $it->unit_price;
                                $picture_ori = $it->picture_ori ;
                                $total += $unit_price * $or->quantity;


                             ?>
                                <li class="price-list">
                                    <i class="closeButton fa-solid fa-xmark"></i>
                                    <div class="counter-container">
                                        <div class="counter-food">
                                            <img alt="food" src="{{$picture_ori}}" style="    width: 100px;">
                                            <h4>{{$description}}</h4>
                                        </div>
                                        <h3>{{$unit_price}}</h3>
                                    </div>
                                    <div class="price">
                                        <div>
                                            <h2>{{$unit_price}}</h2>
                                            <span>Sum</span>
                                        </div>
                                        <div>
                                            <div class="qty-input">
                                                <button class="qty-count qty-count--minus" data-action="minus"
                                                    type="button">-</button>
                                                <input class="product-qty" type="number" name="product-qty" min="0"
                                                    value="1">
                                                <button class="qty-count qty-count--add" data-action="add"
                                                    type="button">+</button>
                                            </div>
                                            <span>Quantity</span>
                                        </div>
                                    </div>
                                </li>
                             @endforeach
						
						</ul>
						<div class="totel-price">
							<span>Total order:</span>
							<h5>${{$total}}</h5>
						</div>
						<div class="totel-price">
							<span>To pay:</span>
							<h2>${{$total}}</h2>
						</div>

					</div>
				</div>
				<div class="offset-xl-1 col-xl-6 col-lg-12" data-aos="flip-up" data-aos-delay="300"
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
				</div>
			</div>
		</div>
	</section>
	<!-- footer -->
	<footer class="gap no-bottom" style="background-color: #363636;">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-12">
					<div class="footer-description">
						<a href="index.html">
							<svg xmlns="http://www.w3.org/2000/svg" width="163" height="38" viewBox="0 0 163 38">
								<g id="Logo" transform="translate(-260 -51)">
									<g id="Logo-2" data-name="Logo" transform="translate(260 51)">
										<g id="Elements">
											<path id="Path_1429" data-name="Path 1429"
												d="M315.086,140.507H275.222v-.894c0-11.325,8.941-20.538,19.933-20.538s19.931,9.213,19.931,20.538Z"
												transform="translate(-270.155 -115.396)" fill="#f29f05" />
											<path id="Path_1430" data-name="Path 1430"
												d="M301.13,133.517a1.488,1.488,0,0,1-1.394-.994,11.361,11.361,0,0,0-10.583-7.54,1.528,1.528,0,0,1,0-3.055,14.353,14.353,0,0,1,13.37,9.527,1.541,1.541,0,0,1-.875,1.966A1.444,1.444,0,0,1,301.13,133.517Z"
												transform="translate(-264.176 -113.935)" fill="#fff" />
											<path id="Path_1431" data-name="Path 1431"
												d="M297.343,146.544a14.043,14.043,0,0,1-13.837-14.211h2.975a10.865,10.865,0,1,0,21.723,0h2.975A14.043,14.043,0,0,1,297.343,146.544Z"
												transform="translate(-266.247 -108.544)" fill="#fff" />
											<path id="Path_1432" data-name="Path 1432"
												d="M302.183,132.519a7.064,7.064,0,1,1-14.122,0Z"
												transform="translate(-264.027 -108.446)" fill="#fff" />
											<path id="Path_1433" data-name="Path 1433"
												d="M320.332,134.575H273.3a1.528,1.528,0,0,1,0-3.055h47.033a1.528,1.528,0,0,1,0,3.055Z"
												transform="translate(-271.815 -108.923)" fill="#f29f05" />
											<path id="Path_1434" data-name="Path 1434"
												d="M289.154,123.4a1.507,1.507,0,0,1-1.487-1.528v-3.678a1.488,1.488,0,1,1,2.975,0v3.678A1.508,1.508,0,0,1,289.154,123.4Z"
												transform="translate(-264.154 -116.667)" fill="#f29f05" />
											<path id="Path_1435" data-name="Path 1435"
												d="M284.777,138.133H275.3a1.528,1.528,0,0,1,0-3.055h9.474a1.528,1.528,0,0,1,0,3.055Z"
												transform="translate(-270.84 -107.068)" fill="#fff" />
											<path id="Path_1436" data-name="Path 1436"
												d="M284.8,141.691h-6.5a1.528,1.528,0,0,1,0-3.055h6.5a1.528,1.528,0,0,1,0,3.055Z"
												transform="translate(-269.379 -105.218)" fill="#fff" />
										</g>
									</g>
									<text id="Quickeat" transform="translate(320 77)" fill="#fff" font-size="20"
										font-family="Poppins" font-weight="700">
										<tspan x="0" y="0">QUICK</tspan>
										<tspan y="0" fill="#f29f05">EAT</tspan>
									</text>
								</g>
							</svg>
						</a>
						<h2>The Best Restaurants
							in Your Home</h2>
						<p>Vitae congue mauris rhoncus aenean. Enim nulla
							aliquet porttitor lacus luctus accumsan
							tortor posuere. Tempus egestas sed sed risus pretium quam.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="menu">
						<h4>Menu</h4>
						<ul class="footer-menu">
							<li><a href="index.html">home<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="about.html">about us<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="restaurants.html">Restaurants<i class="fa-solid fa-arrow-right"></i></a></li>
							<li><a href="contacts.html">Contacts<i class="fa-solid fa-arrow-right"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="menu contacts">
						<h4>Contacts</h4>
						<div class="footer-location">
							<i class="fa-solid fa-location-dot"></i>
							<p>1717 Harrison St, San Francisco, CA 94103,
								United States</p>
						</div>
						<a href="mailto:quickeat@mail.net"><i class="fa-solid fa-envelope"></i>quickeat@mail.net</a>
						<a href="callto:+14253261627"><i class="fa-solid fa-phone"></i>+1 425 326 16 27</a>
					</div>
					<ul class="social-media">
						<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="footer-two gap no-bottom">
				<p>Copyright © 2022. Quickeat. All rights reserved.</p>
				<div class="privacy">
					<a href="#">Privacy Policy</a>
					<a href="#">Terms & Services</a>
				</div>
			</div>
		</div>
	</footer>
@endsection 