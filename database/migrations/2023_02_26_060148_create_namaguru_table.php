<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('namaguru', function (Blueprint $table) {
            $table->id();
            $table->String('namaguru');
            $table->bigInteger('nip');
            $table->String('foto');
            $table->enum('status',['aktif','tidakaktif']);
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('namaguru');
    }
};
