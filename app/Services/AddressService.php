<?php

namespace App\Services;

use App\Address;

class AddressService {

    public function getEncodedAddress($shipping_or_billing_address_id){
        $addressObj = Address::with('location')->find($shipping_or_billing_address_id);
        if (!empty($addressObj)) {
            $address = [
                'area' => $addressObj->address,
                'city' => $addressObj->location->parent->name,
                'region' => $addressObj->location->parent->parent->name
            ];

            return json_encode($address);
        } else {
            throw new \Exception('Address not found');
        }

    }

    public function decodeAddress($encodedAddress){
        $address = json_decode($encodedAddress);
        return $address->area . ', ' . $address->city . ', ' . $address->region;
    }
}
