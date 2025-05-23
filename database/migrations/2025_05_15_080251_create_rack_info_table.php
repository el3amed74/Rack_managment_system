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
        Schema::create('rack_info', function (Blueprint $table) {
            $table->id();
            $table->text('building_r_id');
            $table->text('switch_id');
            $table->string('product_panal');
            $table->string('product_serial')->unique();
            $table->string('product_mac')->unique();
            $table->string('product_model');
            $table->string('product_port');
            $table->text('device_name');
            $table->text('site_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rack_info');
    }
};
