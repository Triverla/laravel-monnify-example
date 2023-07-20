<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

    <div class="container mx-auto">
        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
            {{ csrf_field() }} {{-- or @csrf--}}
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg my-5">
            <img class="object-cover h-48 w-full" src="{{asset('images/blue-t-shirt.jpg')}}" alt="Blue T-Shirt">
            <div class="py-4 px-6">
                <h2 class="text-2xl font-semibold">Blue T-shirt</h2>
                <p class="text-gray-700 mt-2">Blue T-shirt available in all sizes</p>
                <div class="mt-4">
                    <span class="text-gray-600 font-bold text-lg">₦5,990</span>
                    <input type="hidden" name="customer_email" value="john.doe@gmail.com">
                    <input type="hidden" name="customer_name" value="John Doe">
                    <input type="hidden" name="amount" value="5990">
                    <input type="hidden" name="currency" value="NGN">
                    <input type="hidden" name="description" value="Bill Payment">
                    <input type="hidden" name="reference" value="{{ Monnify::genTransactionReference() }}">
                    <input type="hidden" name="redirect_url" value="http://localhost:8000/payment/callback">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full float-right my-5">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
        </form>
    </div>
    </body>
</html>
