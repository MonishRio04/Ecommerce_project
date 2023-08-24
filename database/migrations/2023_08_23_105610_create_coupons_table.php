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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->string('coupon_name');
            $table->integer('uses')->comment('how many users used count');
            $table->integer('max_uses')->comment('maximum limit');
            $table->integer('discount_amount');
            $table->integer('status')->comment('1=>active 2->inactive');
            $table->integer('minimum_purchase')->comment('minimum_purchase for coupon eligible');
            $table->timestamp('expires_at');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
