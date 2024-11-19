<div class="col-xl-12 col-lg-12" data-aos="flip-up" data-aos-delay="200" data-aos-duration="300">
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