@extends('client.template')
@section('content')
	<section class="hero-section about gap" style="background-image: url(assets/img/background-1.png);">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
					<div class="about-text">
						<ul class="crumbs d-flex">
							<li><a href="index.html">Home</a></li>
							<li><a href="index.html"><i class="fa-solid fa-right-long"></i>Restaurants</a></li>
							<li class="two"><a href="index.html"><i class="fa-solid fa-right-long"></i>The
									Wilmington</a></li>
						</ul>
						<div class="logo-detail">
							<img alt="logo" src="{{$merchant->picture_org}}">
							<h2>{{$merchant->name}}</h2>
						</div>
						<div class="rate">
							<span>Rate:</span>
							<div class="star">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star-half-stroke"></i>
							</div>
							<span>CUISINES:</span>
							<div class="cafa-button">
								<a href="#">american</a>
								<a href="#">steakhouse</a>
								<a href="#">seafood</a>
							</div>
							<span>FEATURES:</span>
							<p>{{$merchant->detail}}</p>
						</div>

					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="500">
					<div class="about-img">
						<img alt="man" src="{{$merchant->picture_org}}">
						<div class="hours">
							<i class="fa-regular fa-clock"></i>
							<h4>9am – 12pm<br><span>Hours</span></h4>
						</div>
						<div class="hours two">
							<i class="fa-solid fa-utensils"></i>
							<h4>Breakfast, Lunch, Dinner<br><span>Meals</span></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- tabs -->
	<section class="tabs gap">

		<div class="container">

			<div class="tabs-img-back">

				<div class="row">

					<div class="col-lg-12">

						<div class="Provides" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
							<div class="nav nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								@foreach ($item_category as $category)
									<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
										data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
										aria-selected="true">{{$category->description}}</button>
								@endforeach
							</div>
						</div>

					</div>

					<div class="col-lg-12">

						<div class="tab-content" id="v-pills-tabContent">

							<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
								aria-labelledby="v-pills-home-tab">
								<div class="row">
										@foreach ($items as $item)
											@include('client\layouts\item')
										@endforeach
								</div>

							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

	</section>
 
@endsection