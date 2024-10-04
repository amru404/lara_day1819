<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'PurchaseOrders';

    protected $fillable = [
        'no_order',
        'nama',
        'alamat',
        'product_id',
        'qty',
        'total_harga',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
