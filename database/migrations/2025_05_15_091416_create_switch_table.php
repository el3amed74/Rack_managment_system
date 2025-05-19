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
            $table->string("serial_number")->unique();
            $table->string("mac_add")->unique();
            $table->string("ip_add")->unique();
            $table->string("up_link_core1")->unique();
            $table->string("up_link_core2")->unique();
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
