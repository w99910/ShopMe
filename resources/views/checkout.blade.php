<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customcss/customcss.css') }}" rel="stylesheet">

    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    @livewireStyles
    <style>
        input#menu-toggle:checked ~ #menu {
            display: block;

        }
        @media only screen and (max-width: 640px) {
            div#menu{
                display: none;
            }
            div#png1{
                display:none;
            }

        }
        .form-item{
            @apply rounded px-2 py-1;
        }
        .form-item:focus{
            @apply border-blue-300 outline-none ;
        }
    </style>
</head>
<body class=" font-poppins overflow-hidden h-screen m-0"  >
@auth
    <div id="app"></div>
    <div class="absolute top-0 left-0 mt-4 ml-4">
        <a href="{{route('home')}}">
            <svg id="color" enable-background="new 0 0 24 24" height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12 12-5.383 12-12-5.383-12-12-12z" fill="#2196f3"/><path d="m12 0c-6.617 0-12 5.383-12 12s5.383 12 12 12z" fill="#1d83d4"/><path d="m10.73 18.791-6.5-6.25c-.147-.142-.23-.337-.23-.541s.083-.399.23-.541l6.5-6.25c.475-.458 1.27-.119 1.27.541v3.25h5.75c.689 0 1.25.561 1.25 1.25v3.5c0 .689-.561 1.25-1.25 1.25h-5.75v3.25c0 .664-.798.995-1.27.541z" fill="#fff"/><path d="m19 12h-15c0 .204.083.399.23.541l6.5 6.25c.15.145.334.21.514.21.385-.001.756-.299.756-.751v-3.25h5.75c.689 0 1.25-.561 1.25-1.25z" fill="#dedede"/></svg>
        </a>
    </div>
    <div class="h-full bg-transparent w-full">
        <div class="w-full p-10 h-full">
            <div class="w-full py-5 rounded-lg shadow-xl px-5 h-64 h-full flex bg-background">
                <div class="w-4/12 h-full">
                    <form action="{{route('checkout.process')}}" method="POST" id="checkout-form" class="h-full rounded-lg bg-lightwhite flex flex-col justify-between" x-data="{first_name: '' , last_name:'' , email:'',ph_no:''}">
                        @csrf

                      <div class="flex flex-wrap">
                       <div class="flex flex-col">
                           <input id="first-name" name="first_name" x-model="first_name"  placeholder="First name" type="text" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" autocomplete="off">
                       </div>
                          <div class="flex flex-col">
                              <input id="last-name" x-model="last_name" name="last_name" placeholder="Last name" type="text" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" autocomplete="off">
                          </div>
                          <div class="flex flex-col">
                              <input id="email" x-model="email" name="email" placeholder="Email" type="text" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" autocomplete="off">
                          </div>
                          <div class="flex flex-col">
                              <input id="ph_no" name="ph_no" x-model="ph_no" placeholder="Phone Number" type="text" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" autocomplete="off">
                          </div>

                      </div>
                        <input id="payment-method" type="hidden" name="payment-method" value="">
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" ></div>
                        <div class="">
                            <ul>
                                <li>
                                    <span :class="{'text-green-700':  first_name.length > 0, 'text-red-700': first_name.length == 0}"
                                            class="font-medium text-sm ml-3"
                                            x-text="first_name.length > 0 ? '' : 'First Name is required' ">
                                    </span>
                                </li>
                                <li>
                                    <span :class="{'text-green-700':  last_name.length > 0, 'text-red-700': last_name.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="last_name.length > 0 ? '' : 'Last Name is required' ">
                                    </span>
                                </li><li>
                                    <span :class="{'text-green-700':  email.length > 0, 'text-red-700': email.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="email.length > 0 ? '' : 'Email is required' ">
                                    </span>
                                </li><li>
                                    <span :class="{'text-green-700':  ph_no.length > 0, 'text-red-700': ph_no.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="ph_no.length > 0 ? '' : 'Ph_no is required' ">
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <button id="card-button" class="px-3 py-2 text-white bg-orange-500">
                            Pay
                        </button>
                    </form>
                </div>
        @livewire('checkout')
            </div>
        </div>
    </div>
@endauth

@livewireScripts
@include('sweetalert::alert')
<script src="https://js.stripe.com/v3/"></script>
<script>
    function stripeTokenHandler(token){
        var form=document.getElementById('checkout-form');
        var hiddenInput=document.createElement('input');
        hiddenInput.setAttribute('type','hidden');
        hiddenInput.setAttribute('name','stripeToken');
        hiddenInput.setAttribute('value',token);
        form.appendChild(hiddenInput);

    }
    $(document).ready(function() {
        let stripe = Stripe('{{env('STRIPE_KEY')}}');

        let elements = stripe.elements();
        let style = {
            base: {
                lineHeight: '18px',
                fontFamily:'Poppins',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        let card = elements.create('card',{style:style});
        let name = document.getElementById('first-name')+" "+ document.getElementById('last-name');
        card.mount('#card-element');
        let paymentMethod = null
        $('#checkout-form').on('submit', function (e) {
            if (paymentMethod) {
                return true;
            }
            stripe.confirmCardSetup(
                "{{$intent->client_secret}}",
                {
                    payment_method: {
                        card: card,
                        billing_details: {name: name}

                    }
                }
            ).then(function (result) {
                if (result.error) {
                    // console.log(result);
                } else {
                    // console.log(result.setupIntent.id);
                    paymentMethod = result.setupIntent.payment_method;
                    stripeTokenHandler(result.setupIntent.id);
                    $('#payment-method').val(paymentMethod)
                    $('#checkout-form').submit()
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
