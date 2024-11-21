<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendis extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ref',
        'application_date',
        'applicant_type',
        'applicant_name',
        'beneficiary',
        'district',
        'fund_type',
        'program',
        'asnaf',
        'subject',
        'financial_aid',
        'distribution_date',
        'receiver',
        'desc',
        'rec',
        'total_benef',
        'doc_upload',
        'photos',
    ];

    protected $casts = [
        'beneficiary' => 'array', // Konversi data JSON menjadi array PHP
    ];

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
