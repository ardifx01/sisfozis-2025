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
        Schema::create('pendag', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Diproses');
            $table->foreignId('no_ref');
            $table->date('application_date');
            $table->text('applicant_type');
            $table->text('applicant_name');
            $table->jsonb('beneficiary');
            $table->text('district');
            $table->text('village');
            $table->text('fund_type')->nullable();
            $table->text('program')->nullable();
            $table->text('cat_program')->nullable();
            $table->text('asnaf')->nullable();
            $table->text('subject')->nullable();
            $table->integer('financial_aid')->nullable();
            $table->date('distribution_date')->nullable();
            $table->text('receiver')->nullable();
            $table->text('desc')->nullable();
            $table->text('rec');
            $table->integer('total_benef');
            $table->string('doc_upload')->nullable();
            $table->string('photos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendag');
    }
};
