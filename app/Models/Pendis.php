<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendis extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'no_ref',
        'application_date',
        'applicant_type',
        'applicant_name',
        'beneficiary',
        'district',
        'village',
        'fund_type',
        'program',
        'cat_program',
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
        'beneficiary' => 'array',
        'application_date' => 'date',
        'distribution_date' => 'date', // Konversi data JSON menjadi array PHP
    ];

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function program_relation()
    {
        return $this->belongsTo(Program::class, 'program');
    }

    public function sub_program_relation()
    {
        return $this->belongsTo(SubProgram::class, 'cat_program');
    }
}
