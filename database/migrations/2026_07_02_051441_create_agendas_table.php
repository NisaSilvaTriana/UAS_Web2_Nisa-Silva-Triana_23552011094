<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE agendas CHANGE judul nama_kegiatan VARCHAR(255)");
        DB::statement("ALTER TABLE agendas CHANGE tanggal_mulai tanggal DATE");
        DB::statement("ALTER TABLE agendas CHANGE waktu jam TIME");

        Schema::table('agendas', function (Blueprint $table) {
            $table->dropColumn(['deskripsi', 'tanggal_selesai']);
        });
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE agendas CHANGE nama_kegiatan judul VARCHAR(255)");
        DB::statement("ALTER TABLE agendas CHANGE tanggal tanggal_mulai DATE");
        DB::statement("ALTER TABLE agendas CHANGE jam waktu TIME");

        Schema::table('agendas', function (Blueprint $table) {
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_selesai')->nullable();
        });
    }
};