<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrder extends Model
{
    protected $table = 'supplierorders';

    protected $guarded = [];
    
    protected $dates = ['order_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
