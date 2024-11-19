@extends('client.template')
@section('content')
<section class="hero-section gap" style="background-image: url(assets/img/background-1.png);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
                <div class="restaurant">
                    <h1>The Best restaurants
                        in your home</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                    <div class="nice-select-one">
                        <select class="nice-select Advice">
                            <option>Choose a Restaurant</option>
                            <option>Choose a Restaurant 1</option>
                            <option>Choose a Restaurant 2</option>
                            <option>Choose a Restaurant 3</option>
                            <option>Choose a Restaurant 4</option>
                        </select>
                        <a href="#" class="button button-2">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
                <div class="img-restaurant">
                    <img alt="man" src="https://via.placeholder.com/680x720">
                    <div class="wilmington">
                        <img alt="img" src="https://via.placeholder.com/90x90">
                        <div>
                            <p>Restaurant of the Month</p>
                            <h6>The Wilmington</h6>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star-half-stroke"></i>
                            </div>
                        </div>
                    </div>
                    <div class="wilmington location-restaurant">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h6>12 Restaurant</h6>
                            <p>In Your city</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- works-section -->
<section class="works-section gap no-top">
    <div class="container">
        <div class="hading" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
            <h2>How it works</h2>
            <p>Magna sit amet purus gravida quis blandit turpis cursus. Venenatis tellus in<br> metus vulputate eu
                scelerisque felis.</p>
        </div>
        <div class="row ">
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="200"
                data-aos-duration="300">
                <div class="work-card">
                    <img alt="img" src="https://via.placeholder.com/300x154">
                    <h4><span>01</span> Select Restaurant</h4>
                    <p>Non enim praesent elementum facilisis leo vel fringilla. Lectus proin nibh nisl condimentum
                        id. Quis varius quam quisque id diam vel.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="300"
                data-aos-duration="400">
                <div class="work-card">
                    <img alt="img" src="https://via.placeholder.com/300x154">
                    <h4><span>02</span> Select menu</h4>
                    <p>Eu mi bibendum neque egestas congue quisque. Nulla facilisi morbi tempus iaculis urna id
                        volutpat lacus. Odio ut sem nulla pharetra diam sit amet.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="flip-up" data-aos-delay="400"
                data-aos-duration="500">
                <div class="work-card">
                    <img alt="img" src="https://via.placeholder.com/300x154">
                    <h4><span>03</span> Wait for delivery</h4>
                    <p>Nunc lobortis mattis aliquam faucibus. Nibh ipsum consequat nisl vel pretium lectus quam id
                        leo. A scelerisque purus semper eget. Tincidunt arcu non.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- best-restaurants -->
<section class="best-restaurants gap" style="background:#fcfcfc">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
                <div class="city-restaurants">
                    <h2>12 Best Restaurants in Your City</h2>
                    <p>Magna sit amet purus gravida quis blandit turpis cursus. Venenatis tellus in metus vulputate.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="flip-up" data-aos-delay="300" data-aos-duration="400">
                <div class="logos-card">
                    <img alt="logo" src="https://via.placeholder.com/100x100">
                    <div class="cafa">
                        <h4><a href="restaurant-card.html">Kennington Lane Cafe</a></h4>
                        <div>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="cafa-button">
                            <a href="#">american</a>
                            <a href="#">steakhouse</a>
                            <a class="end" href="#">seafood</a>
                        </div>
                        <p>Non enim praesent elementum facilisis leo vel fringilla. Lectus proin nibh nisl
                            condimentum id. Quis varius quam quisque id diam vel.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="flip-up" data-aos-delay="400" data-aos-duration="500">
                <div class="logos-card two">
                    <img alt="logo" src="https://via.placeholder.com/100x100">
                    <div class="cafa">
                        <h4><a href="restaurant-card.html">The Wilmington</a></h4>
                        <div>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="cafa-button">
                            <a href="#">american</a>
                            <a href="#">steakhouse</a>
                            <a class="end" href="#">seafood</a>
                        </div>
                        <p>Vulputate enim nulla aliquet porttitor lacus luctus. Suscipit adipiscing bibendum est
                            ultricies integer. Sed adipiscing diam donec adipiscing tristique.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="flip-up" data-aos-delay="500" data-aos-duration="600">
                <div class="logos-card three">
                    <img alt="logo" src="https://via.placeholder.com/100x100">
                    <div class="cafa">
                        <h4><a href="restaurant-card.html">Kings Arms</a></h4>
                        <div>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <div class="cafa-button">
                            <a href="#">healthy</a>
                            <a href="#">steakhouse</a>
                            <a class="end" href="#">vegetarian</a>
                        </div>
                        <p>Tortor at risus viverra adipiscing at in tellus. Cras semper auctor neque vitae tempus.
                            Dui accumsan sit amet nulla facilisi. Sed adipiscing diam donec adipiscing tristique.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-gap">
            <a href="restaurants.html" class="button button-2 non">See All<i
                    class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
<!-- your-favorite-food -->
<section class="your-favorite-food gap" style="background-image: url(assets/img/background-1.png);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
                <div class="food-photo-section">
                    <img alt="img" src="https://via.placeholder.com/676x700">
                    <a href="#" class="one"><i class="fa-solid fa-burger"></i>Burgers</a>
                    <a href="#" class="two"><i class="fa-solid fa-cheese"></i>Steaks</a>
                    <a href="#" class="three"><i class="fa-solid fa-pizza-slice"></i>Pizza</a>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1" data-aos="fade-up" data-aos-delay="300" data-aos-duration="400">
                <div class="food-content-section">
                    <h2>Food from your favorite restaurants
                        to your table</h2>
                    <p>Pretium lectus quam id leo in vitae turpis massa sed. Lorem donec massa sapien faucibus et
                        molestie. Vitae elementum curabitur vitae nunc.</p>
                    <a href="#" class="button button-2">Order Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
 
@endsection


