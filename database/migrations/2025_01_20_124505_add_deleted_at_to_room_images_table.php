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
            $table->string('name')->nullable()->change(); // Membuat kolom `name` nullable
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change(); // Mengembalikan ke NOT NULL
        });
    }
};
