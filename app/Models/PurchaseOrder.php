<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'Purchase_orders';

    protected $fillable = [
        'no_order',
        'nama',
        'alamat',
        'products_id',
        'qty',
        'total_harga',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'products_id');
    }
}
