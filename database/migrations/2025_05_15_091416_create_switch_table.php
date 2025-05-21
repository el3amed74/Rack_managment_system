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
        Schema::create('switch', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("serial_number");
            $table->string("mac_add");
            $table->string("ip_add");
            $table->string("up_link_core1");
            $table->string("up_link_core2");
            $table->integer("port_number");
            $table->string("model");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('switch');
    }
};
