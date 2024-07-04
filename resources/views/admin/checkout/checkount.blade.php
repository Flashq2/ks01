@extends('admin.layouts.app_content')
@section('title')
    Check Out
@endsection
@section('style')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 700px;
        }
    </style>
@endsection
<div class="main-contents">

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div class="ex-page-content text-center">
                                <input id="card-holder-name" type="text">

                                <!-- Stripe Elements Placeholder -->
                                <div id="card-element"></div>

                                <button id="card-button">
                                    Process Payment
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@section('script')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('pk_live_51PXON4RrjBzfJjwTuBAx3e6waIJfIgN0c7admwrjwdxVvsVpgjjicVrFH6s5n7PujZo1sbYG0TX32tlAcb3iLFHC00dLdEtwgT');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        });
    </script>
@endsection
