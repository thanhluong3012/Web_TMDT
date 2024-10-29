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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('tenTB');
            $table->foreignId('id_loaiTB')->constrained('loai_t_b_s');
            $table->enum('trangthai', ['Bao tri', 'Chua bao tri']);
            $table->string('hinh');
            $table->timestamps(); //thời gian tạo và Tg cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
