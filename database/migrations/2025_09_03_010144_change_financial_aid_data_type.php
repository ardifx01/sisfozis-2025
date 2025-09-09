<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::transaction(function () {
            // opsional: kosongkan string kosong menjadi NULL
            DB::statement("UPDATE pendis SET financial_aid = NULL WHERE trim(financial_aid) = ''");

            // Ubah tipe dengan aturan konversi yang aman
            DB::statement("
                ALTER TABLE pendis
                ALTER COLUMN financial_aid
                TYPE INTEGER
                USING NULLIF(regexp_replace(financial_aid, '[^0-9-]', '', 'g'), '')::integer
            ");
        });
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE pendis
            ALTER COLUMN financial_aid
            TYPE TEXT
            USING financial_aid::text
        ");
    }
};
