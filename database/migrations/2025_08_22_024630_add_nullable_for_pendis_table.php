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
        Schema::table('pendis', function (Blueprint $table) {
            $table->string('fund_type')->nullable()->change();
            $table->string('program')->nullable()->change();
            $table->string('asnaf')->nullable()->change();
            $table->string('financial_aid')->nullable()->change();
            $table->date('distribution_date')->nullable()->change();
            $table->string('receiver')->nullable()->change();
            $table->integer('total_benef')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('pendis', function (Blueprint $table) {
            $table->string('fund_type')->nullable(false)->change();
            $table->string('program')->nullable(false)->change();
            $table->string('asnaf')->nullable(false)->change();
            $table->string('financial_aid')->nullable(false)->change();
            $table->date('distribution_date')->nullable(false)->change();
            $table->string('receiver')->nullable(false)->change();
            $table->integer('total_benef')->nullable(false)->change();
        });
    }
};
