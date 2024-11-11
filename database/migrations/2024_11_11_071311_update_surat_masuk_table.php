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
        //
        Schema::table('surat_masuks', function (Blueprint $table) {
            $table->text('from')->nullable()->change();
            $table->text('no_letter')->nullable()->change();
            $table->text('subject')->nullable()->change();
            $table->text('contact')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->string('file')->nullable()->change();
            $table->string('dept_disposition')->nullable()->change();
            $table->string('desc_disposition')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
