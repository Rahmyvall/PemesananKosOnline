<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('name')->default('Unnamed Room')->change(); // Menambahkan nilai default
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('name')->default(null)->change(); // Menghapus default value
        });
    }
};
