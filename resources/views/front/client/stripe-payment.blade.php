<!DOCTYPE html>
 
<html>
 
<head>
 
 <title>Uren - Car Accessories Shop</title>
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <style type="text/css">
 
        .panel-title {
 
        display: inline;
 
        font-weight: bold;
 
        }
 
        .display-table {
 
            display: table;
 
        }
 
        .display-tr {
 
            display: table-row;
 
        }
 
        .display-td {
 
            display: table-cell;
 
            vertical-align: middle;
 
            width: 61%;
 
        }
 
    </style>
 
</head>
 
<body>
 
  
 
<div class="container">
 
 
      <div class="row">
 
        <div class="col-md-6 col-md-offset-3">
 
            <div class="panel panel-default credit-card-box">
 
                <div class="panel-heading display-table" >
 
                    <div class="row display-tr" >
                    <h2>Make Payment</h2>
                     @if (Session::has('dashboard'))
                        <a href="{{route('buyer-dashboard')}}"><h3 class="panel-title display-td" >Go back to Dashboard</h3></a>
 
                        <!-- <div class="display-td" >                            
 
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
 
                        </div> -->
                        @endif
 
                    </div>                    
 
                </div>
 
                <div class="panel-body">
 
                    @if (Session::has('success'))
 
                        <div class="alert alert-success text-center">
 
<!--                             <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
 --> 
                            <p>{{ Session::get('success') }}</p>
 
                        </div>
 
                    @endif
 
                 <form role="form" action="{{ route('card-payment.post') }}" method="post" class="require-validation"
 
                                                     data-cc-on-file="false"
 
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
 
                                                    id="payment-form">
 
                        @csrf
 
  
 
                        <div class='form-row row'>
 
                            <div class='col-xs-12 form-group required'>
 
                                <label class='control-label'>Name on Card</label> <input
 
                                  name="name_on_card"  class='form-control' size='4' type='text'>
 
                            </div>
 
                        </div>
 
  
 
                        <div class='form-row row'>
 
                            <div class='col-xs-12 form-group card required'>
 
                                <label class='control-label'>Card Number</label> <input
 
                                name="card_number"    autocomplete='off' class='form-control card-number' size='20'
 
                                    type='number'>
 
                            </div>
 
                        </div>
 
  
 
                        <div class='form-row row'>
 
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
 
                                <label class='control-label'>CVC</label> <input autocomplete='off'
 
                                 name="cvc"   class='form-control card-cvc' placeholder='ex. 311' size='4'
 
                                    type='number'>
 
                            </div>
 
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
 
                                <label class='control-label'>Expiration Month</label> <input
 
                                  name="expiration_month"  class='form-control card-expiry-month' placeholder='MM' size='2'
 
                                    type='number'>
 
                            </div>
 
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
 
                                <label class='control-label'>Expiration Year</label> <input
 
                                  name="expiration_year"  class='form-control card-expiry-year' placeholder='YYYY' size='4'
 
                                    type='number'>
 
                            </div>
 
                        </div>
 
  
 
                        <div class='form-row row'>
 
                            <div class='col-md-12 error form-group hide'>
 
                                <div class='alert-danger alert'>Please correct the errors and try
 
                                    again.</div>
 
                            </div>
 
                        </div>
 
  
 
                        <div class="row">
 
                            <div class="col-xs-12">
 
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ({{Cart::subtotal()}} BDT)</button>
 
                            </div>
 
                        </div>
 
                        <input type="hidden" name="amount" value="{{Cart::subtotal()}}">
                        <input type="hidden" name="region_id" value="{{$allData['region_id']}}">
                        <input type="hidden" name="city_id" value="{{$allData['city_id']}}">
                        <input type="hidden" name="address" value="{{$allData['address']}}">
                        <input type="hidden" name="name" value="{{$allData['name']}}">
                        <input type="hidden" name="email" value="{{$allData['email']}}">
                        <input type="hidden" name="phone" value="{{$allData['phone']}}">
 
                    </form>
 
                </div>
 
            </div>        
 
        </div>
 
    </div>
 
      
 
</div>
 
  
 
</body>
 
  
 
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<script>
@if (session('alert'))
    swal("{{ session('alert') }}");
@endif
</script>  
 
<script type="text/javascript">
 
$(function() {
 
    var $form         = $(".require-validation");
 
  $('form.require-validation').bind('submit', function(e) {
 
    var $form         = $(".require-validation"),
 
        inputSelector = ['input[type=email]', 'input[type=password]',
 
                         'input[type=text]', 'input[type=file]',
 
                         'textarea'].join(', '),
 
        $inputs       = $form.find('.required').find(inputSelector),
 
        $errorMessage = $form.find('div.error'),
 
        valid         = true;
 
        $errorMessage.addClass('hide');
 
 
 
        $('.has-error').removeClass('has-error');
 
    $inputs.each(function(i, el) {
 
      var $input = $(el);
 
      if ($input.val() === '') {
 
        $input.parent().addClass('has-error');
 
        $errorMessage.removeClass('hide');
 
        e.preventDefault();
 
      }
 
    });
 
  
 
    if (!$form.data('cc-on-file')) {
 
      e.preventDefault();
 
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
 
      Stripe.createToken({
 
        number: $('.card-number').val(),
 
        cvc: $('.card-cvc').val(),
 
        exp_month: $('.card-expiry-month').val(),
 
        exp_year: $('.card-expiry-year').val()
 
      }, stripeResponseHandler);
 
    }
 
  
 
  });
 
  
 
  function stripeResponseHandler(status, response) {
 
        if (response.error) {
 
            $('.error')
 
                .removeClass('hide')
 
                .find('.alert')
 
                .text(response.error.message);
 
        } else {
 
            var token = response['id'];
 
            $form.find('input[type=text]').empty();
 
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
 
            $form.get(0).submit();
 
        }
 
    }
 
  
 
});
 
</script>
 
</html>