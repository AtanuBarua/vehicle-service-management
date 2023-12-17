<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Order extends Model
{
    protected $fillable = ['user_id', 'shipping_address_id', 'billing_address_id', 'payment_id', 'status'];

    const ORDER_PENDING = 0;
    const ORDER_PROCESSING = 1;
    const ORDER_SHIPPED = 2;
    const ORDER_DELIVERED = 3;
    const ORDER_CANCELLED = 4;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createOrder($data)
    {
        return $this->create($data);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id', 'payment_id');
    }

    public function shippingAddress()
    {
        return $this->hasOne(Address::class, 'id', 'shipping_address_id');
    }

    public function billingAddress()
    {
        return $this->hasOne(Address::class, 'id', 'billing_address_id');
    }

    public function getClientOrders($search = [])
    {
        $query = $this->query()
            ->with('shippingAddress', 'billingAddress', 'payment')
            ->where('user_id', Auth::id())
            ->latest();

        if (!empty($search['paginate'])) {
            $result = $query->paginate($search['paginate_number']);
        } else {
            $result = $query->get();
        }
        return $result;
    }
}
