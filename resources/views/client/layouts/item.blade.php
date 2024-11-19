<div class="col-xl-4 col-lg-6" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
    <div class="dish">
        <img alt="food-dish" src="{{$item->picture_ori ? $item->picture_ori : "https://via.placeholder.com/369x236"  }}   " style="width: 369px;height:236px">
        <div class="dish-foods">
            <h3>{{$item->description}}</h3>
            <div class="dish-icon">
                <div class="cafa-button">
                    <a href="#">Breakfast</a>
                    <a href="#">Brunch</a>
                </div>
                <div class="dish-icon end">

                    <i class="info fa-solid fa-circle-info"></i>
                    <div class="star">
                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <div class="price">
                <h2>${{format_number($item->unit_price,'amount')}}</h2>
                <div class="qty-input">
                    <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                    <input class="product-qty" type="number" name="product-qty" min="0" value="1" id= "item-{{$item->no}}">
                    <button class="qty-count qty-count--add" data-action="add" data-id= "{{$item->no}}" type="button">+</button>
                </div>
            </div>
            <button class="button-price" onclick="addItemToCard(this)" data-id= "{{$item->no}}">Add to Basket<i class="fa-solid fa-bag-shopping"></i></button>
        </div>
        <div class="dish-info" style="display: none;">
            <i class="info2 fa-solid fa-xmark"></i>
            <h5>
                Potatoes with pork and dried fruits
            </h5>
            <div class="cafa-button">
                <a href="#">Breakfast</a>
                <a href="#">Brunch</a>
            </div>
            <p>In egestas erat imperdiet sed euismod nisi porta. Ultrices sagittis
                orci a scelerisque. Diam quam nulla porttitor.</p>
            <ul class="menu-dish">
                <li>Nulla porttitor massa id;</li>
                <li>Aliquam vestibulum morbi;</li>
                <li>Blandit donec adipiscing;</li>
            </ul>
        </div>
    </div>
</div>
