<?php

use App\Models\category;
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
       Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->integer('category_id');
            // $table->foreignId('cat_id')->references('id')->on('category');
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->integer('variant');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('products');
    }
};
