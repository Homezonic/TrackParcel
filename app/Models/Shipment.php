<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;
    public static function rules()
    {
        return [
            'tracking_id'                    => 'required',
            'shipper_name'                   => 'required|max:255',
            'shipper_address'                => 'required|max:255',
            'shipper_phone_number'           => ['required', 'regex:/^\+?[0-9]{1,}$/'],
            'shipper_country'                => 'required|max:255',
            'shipper_state'                  => 'required|max:255',
            'shipper_city'                   => 'required|max:255',
            'shipper_zipcode'                => 'required|max:255',
            'package_name'                   => 'required|max:100',
            'package_type'                   => 'required|in:Parcel,Box,Cargo,Electronic,Grocery',
            'package_weight'                 => 'required|numeric|between:0,999999.99',
            'receiver_name'                  => 'required|max:255',
            'receiver_phone_number'          => ['required', 'regex:/^\+?[0-9]{1,}$/'],
            'receiver_address'               => 'required|max:255',
            'receiver_country'               => 'required|max:255',
            'receiver_state'                 => 'required|max:255',
            'receiver_city'                  => 'required|max:255',
            'receiver_zipcode'               => 'required|max:255',
        ];
    }
    protected $fillable = [
        'tracking_id',
        'shipper_name',
        'shipper_phone_number',
        'shipper_address',
        'shipper_country',
        'shipper_state',
        'shipper_city',
        'shipper_zipcode',
        'receiver_name',
        'receiver_phone_number',
        'receiver_address',
        'receiver_state',
        'receiver_city',
        'receiver_zipcode',
        'receiver_country',
        'package_name',
        'package_type',
        'package_weight',
    ];

    public function trackingInfo()
    {
        return $this->hasMany(TrackingInfo::class);
    }
}
