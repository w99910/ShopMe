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
        .hide{
            display: none;
        }
    </style>
</head>
<body class=" font-poppins overflow-y-auto sm:overflow-hidden h-screen m-0"  >
@auth
{{--    <div id="app"></div>--}}

    <div class="h-full bg-transparent w-full">
        <div class="w-full p-0 sm:p-10 h-full inline-block sm:block">
            <div class="w-full py-5 rounded-none sm:rounded-lg shadow-xl px-5 h-auto sm:h-full flex flex-col sm:flex-row md:flex-row lg:flex-row bg-background ">
                <div class="h-full w-full sm:w-1/3">
                    <form id="checkout-form" class="h-full rounded-lg bg-lightwhite flex flex-col justify-between" x-data="{first_name: '' , last_name:'' , email:'',ph_no:''}">
                        @csrf

                        <div class="flex flex-col">
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
                        <input id="payment_method" type="hidden" name="payment_method" value="">
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" class="focus:outline-none border focus:border-blue-300 px-2 py-1 my-3 mx-3 rounded shadow" ></div>
                        <div>
                            <ul>
                                <li>
                                    <span :class="{'text-green-700':  first_name.length > 0, 'text-red-700': first_name.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="first_name.length > 0 ? 'First Name' : 'First Name is required' ">
                                    </span>
                                </li>
                                <li>
                                    <span :class="{'text-green-700':  last_name.length > 0, 'text-red-700': last_name.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="last_name.length > 0 ? 'Last Name' : 'Last Name is required' ">
                                    </span>
                                </li><li>
                                    <span :class="{'text-green-700':  email.length > 0, 'text-red-700': email.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="email.length > 0 ? 'Email' : 'Email is required' ">
                                    </span>
                                </li><li>
                                    <span :class="{'text-green-700':  ph_no.length > 0, 'text-red-700': ph_no.length == 0}"
                                          class="font-medium text-sm ml-3"
                                          x-text="ph_no.length > 0 ? 'Phone Number' : 'Phone Number is required' ">
                                    </span>
                                </li>

                            </ul>

                        </div>
                        <button id="card-button" class="px-3 py-2 text-white bg-orange-500 flex items-center justify-center">
                            <i class="fas fa-circle-notch fa-spin fa-2x text-blue-600 hide" id="spinner"></i>   Pay
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
    function ValidateEmail(mail)
    {
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail))
        {
            return true;
        }

        return false;
    }
    function stripeTokenHandler(token){
        var form=document.getElementById('checkout-form');
        var hiddenInput=document.createElement('input');
        hiddenInput.setAttribute('type','hidden');
        hiddenInput.setAttribute('name','stripeToken');
        hiddenInput.setAttribute('value',token);
        form.appendChild(hiddenInput);

    }
    let firstname=document.getElementById('first-name');
    let lastname=document.getElementById('last-name');
    let email=document.getElementById('email');
    let ph_no=document.getElementById('ph_no');
    $(document).ready(function() {
        let stripe = Stripe("{{env('STRIPE_KEY')}}");

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
        if (firstname.value==''&&lastname.value==''&&email.value==''&&ph_no.value=='')
        {
            Swal.fire({
                icon:"error",
                text:"Input fields are required.Please Try again"
            })

        }  else if(!ValidateEmail(email.value)) {
            Swal.fire({
                icon:'error',
                text:'You must enter valid email'
            })
        }
        else{
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
                    $('#payment_method').val(paymentMethod)
                    const data=$("#checkout-form").serialize();
                       var spinner=document.getElementById('spinner');
                       spinner.classList.remove('hide');
                    function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }

                    async function delayedGreeting() {
                        await sleep(3500);
                        location.reload();
                    }
                    axios.post('{{route('checkout.process')}}',data).then((res)=>{
                                spinner.classList.add('hide');

                               Swal.fire({
                                   icon:'success',
                                   text:'Success checkout.Please check your email for more information.',
                                   toast:true,
                                   position:'top-end',
                                   timer:3000,
                                   showConfirmButton:false,
                                   showCloseButton:false,
                               })
                    }).then(()=>{
                       delayedGreeting();

                    })
                    // $('#checkout-form').submit()
                }
            });
        }
            return false;
        });
    });
</script>
</body>
</html>
