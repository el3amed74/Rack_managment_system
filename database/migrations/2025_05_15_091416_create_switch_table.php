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
            $table->integer("serial_number")->unique();
            $table->integer("mac_add")->unique();
            $table->integer("ip_add")->unique();
            $table->integer("up_link_core1")->unique();
            $table->integer("up_link_core2")->unique();
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
