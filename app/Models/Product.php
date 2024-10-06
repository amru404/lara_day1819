<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DataTables;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'nama',
        'harga',
        'stock',
        'kategori', 
    ];

    public function PurchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
    public function SalesOrder()
    {
        return $this->hasMany(SalesOrder::class);
    }
    
}
