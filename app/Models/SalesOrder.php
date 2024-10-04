<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'SalesOrders';

    protected $fillable = [
        'no_order',
        'nama',
        'alamat',
        'product_id',
        'vendor',
        'qty',
        'total_harga',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
