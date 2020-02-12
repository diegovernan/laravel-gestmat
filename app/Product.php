<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplierorders()
    {
        return $this->hasMany(SupplierOrder::class);
    }

    public function customerorders()
    {
        return $this->hasMany(CustomerOrder::class);
    }
}
