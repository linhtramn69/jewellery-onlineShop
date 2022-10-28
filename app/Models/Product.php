<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'ID_product';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'ID_product',
        'name_product',
        'price',
        'image',
        'ID_type',
        'flag'
    ];
    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'ID_type');
    }
    public function billDetail()
    {
        return $this->hasMany(BillDetail::class, 'ID_product');
    }


}
