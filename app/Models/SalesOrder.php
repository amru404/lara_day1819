<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'sales_orders';

    protected $fillable = [
        'no_order',
        'nama',
        'alamat',
        'products_id',
        'vendor',
        'qty',
        'total_harga',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'products_id');
    }
}
