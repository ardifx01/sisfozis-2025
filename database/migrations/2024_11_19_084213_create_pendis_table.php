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
        Schema::create('pendis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('no_ref');
            $table->date('application_date');
            $table->text('applicant_type');
            $table->text('applicant_name');
            $table->jsonb('beneficiary');
            $table->text('district');
            $table->text('fund_type');
            $table->text('program');
            $table->text('asnaf');
            $table->text('subject')->nullable();
            $table->text('financial_aid');
            $table->date('distribution_date');
            $table->text('receiver');
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
        Schema::dropIfExists('pendis');
    }
};
