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
        Schema::table('surat_masuks', function (Blueprint $table) {
            //
            $table->string('district')->nullable()->after('address'); // Menambahkan kolom 'district'
            $table->string('village')->nullable()->after('district'); // Menambahkan kolom 'village'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            //
            $table->dropColumn(['district', 'village']); // Menghapus kolom 'district' dan 'village'
        });
    }
};
