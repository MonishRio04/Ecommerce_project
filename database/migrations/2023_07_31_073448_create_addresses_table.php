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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('name');
            $table->string('mobile_no');
            $table->text('address_line1');
            $table->text('address_line2')->nullable(true);
            $table->integer('country_code')->nullable(true);
            $table->integer('post_code')->nullable(true);
            $table->integer('state_code')->nullable(true);
            $table->integer('city_code')->nullable(true);
            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->integer('address_type');
            $table->timestamps();
            $table->tinyInteger('is_deleted');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
