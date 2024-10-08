<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_order')->default('SO' . Str::random(4));
            $table->string('nama');
            $table->longtext('alamat');
            $table->unsignedBigInteger('products_id');
            $table->string('vendor');
            $table->integer('qty');
            $table->decimal('total_harga',15,2)->nullable()->default(0);
            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
