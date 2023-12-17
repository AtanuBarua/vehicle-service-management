<script>
    //minicart-------------------------------------------------------------------------
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: "{{ route('mini-cart') }}",
            dataType: 'json',
            success: function(response) {
                $('.cartQty').html(response.cartQty);
                $('.cartSubTotal').html(response.cartTotal);
                var miniCart = "";
                $.each(response.cartItems, function(key, value) {
                    miniCart +=
                        `
                    <li class="minicart-product">
                    <a id="${value.rowId}" onclick="if(confirm('Are you sure to remove?'))  minicartItemRemove(this.id)" class="product-item_remove"><i
                    class="ion-android-close"></i></a>
                    <div class="product-item_img">
                    <img src="${value.options.image}" alt="Uren's Product Image">
                    </div>
                    <div class="product-item_content">
                    <a class="product-item_title" href="{{ url('product/${value.options.slug}') }}">${value.name}</a>
                    <span class="product-item_quantity">${value.qty} x ${value.price}</span>
                    </div>
                    </li>

                    `
                });

                $('#miniCartAjax').html(miniCart);
            }
        })
    }

    miniCart();

    //cart-------------------------------------------------------------------
    function cart() {
        $.ajax({
            type: 'GET',
            url: "{{ route('cart-ajax') }}",
            dataType: 'json',
            success: function(response) {
                // $('.cartQty').html(response.cartQty);
                $('#cartSubTotal').html(response.cartTotal);
                var cart = ""
                $.each(response.cartItems, function(key, value) {
                    cart +=
                        `

                    <tr>
                    <td class="uren-product-remove"><a id="${value.rowId}" onclick="if (confirm('Are your sure to remove?'))  cartItemRemove(this.id)"><i class="fa fa-trash"
                    title="Remove"></i></a></td>
                    <td class="uren-product-thumbnail"><a href="{{ url('product/${value.options.slug}') }}"><img height="100" width="100" src="${value.options.image}" alt="Uren's Cart Thumbnail"></a></td>
                    <td class="uren-product-name"><a href="{{ url('product/${value.options.slug}') }}">${value.name}</a></td>
                    <td class="uren-product-price"><span class="amount">${value.price}৳</span></td>

                    <td class="quantity">
                    <label>Quantity</label>
                    <div class="cart-plus-minus">
                    <input name="qty" min="1" max="10" class="cart-plus-minus-box" value="${value.qty}" type="text">
                    <div class="dec qtybutton"><i id="${value.rowId}" onclick="cartDecrement(this.id)" class="fa fa-angle-down"></i></div>
                    <div class="inc qtybutton"><i id="${value.rowId}" onclick="cartIncrement(this.id)" class="fa fa-angle-up"></i></div>
                    </div>
                    </td>

                    <td class="product-subtotal"><span class="amount">${value.price*value.qty}</span></td>
                    <td class="product-subtotal">

                    <input type="hidden" name="id" value="${value.rowId}">


                    </td>
                    </tr>

                    `
                });

                $('#cartAjax').html(cart);
            }
        })
    }

    cart();

    //add to cart-----------------------------------------------------
    function addToCart(id) {

        event.preventDefault();

        //var productId = this.id;
        var quantity = $('#quantity').val();
        //console.log(productId);
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                qty: quantity
            },
            url: "{{ route('add-to-cart') }}",
            success: function(data) {
                miniCart();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        })

    }

    //minicart item remove-------------------------------------------------------------

    function minicartItemRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '{{ url('minicart-item-remove') }}' + '/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();
                cart();

                // Start Message

                Swal.fire({
                    position: 'top-left',
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1000
                });

                // End Message

            }
        });

    }

    //cart item remove----------------------------------------------------

    function cartItemRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '{{ url('minicart-item-remove') }}' + '/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();

                // Start Message

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1000
                });

                // End Message

            }
        });

    }

    //cart increment
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '{{ url('cart-increment') }}' + '/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();
            }
        });
    }

    //cart decrement
    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '{{ url('cart-decrement') }}' + '/' + rowId,
            dataType: 'json',
            success: function(data) {
                cart();
                miniCart();
            }
        });
    }
</script>
