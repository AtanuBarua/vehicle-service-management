<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <!-- <h2 style="color: green; font-size: 26px;"><strong>Uren Shop</strong></h2> -->
                <br><br>
                <img src="{{public_path('assets/front/images/menu/logo/1.png')}}" height="80" width="100"
                    alt="Uren's Logo">
            </td>
            <td align="right">
                <pre class="font">
               Uren Head Office <br>
               Email: uren@shop.com
               Phone: +8801712345678
               Chittagong, Bangladesh
            </pre>
            </td>
        </tr>
    </table>
    <table width="100%" style="background:white; padding:2px;"></table>
    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name:</strong> {{ $order->user->name }}<br>
                    <strong>Email:</strong> {{ $order->user->email }} <br>
                    @if (!empty($order->user->phone))
                        <strong>Phone:</strong> {{ $order->user->phone }} <br>
                    @endif

                    <strong>Shipping Address:</strong> {{$shippingAddress}} <br>
                    <strong>Billing Address:</strong> {{$billingAddress}} <br>
                </p>
            </td>
            <!-- <td>
          <p class="font">

            <h3><span style="color: green;">Invoice:</span> #123456</h3>
            Order Date: {{ \Carbon\Carbon::parse($order->created_at)->toDateString() }} <br>

         </p>
        </td> -->
        </tr>
        </thead>
        <br>
        <br>
        <tbody class="mt-4">

            @foreach($orderItems as $item)
            <tr class="font">
                <td align="center">
                    @if(str_contains($item->image,'product-images'))
                    <img src="{{public_path($item->image)}}" height="60px;" width="60px;" alt="">
                    @else
                    <img src="{{$item->image}}" height="60px;" width="60px;" alt="">
                    @endif
                </td>
                <td align="center"> {{ $item->name }}</td>
                <td align="center">qty: {{ $item->quantity }}</td>
                <td align="center">price: {{ $item->price }}</td>
                <td align="center">price: {{ $item->subtotal }}</td>
                <!-- <td align="center">{{ $item->quantity }}</td>
        <td align="center">${{ $item->price }}</td>
        <td align="center">${{ $item->subtotal }} </td> -->
            </tr>
            @endforeach

        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <!-- <h2><span style="color: green;">Subtotal:</span>{{ $order->amount }} bdt</h2> -->
                <h2><span style="color: green;">Total:</span> {{$order->payment->amount}} bdt</h2>
                {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
            </td>
        </tr>
    </table>
    {{-- <div class="thanks mt-3">
        <p>Thanks For Buying Our Products.</p>
    </div> --}}
    {{--<div class="authority float-right mt-5">
         <p>-----------------------------------</p>
        <h5>Authority Signature</h5>
    </div>--}}
    <div></div>
    <div class="thanks float-right mt-5">
        <p>Thanks For Buying Our Products.</p>
    </div>
</body>

</html>
