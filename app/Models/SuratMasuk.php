<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'no_agenda',
        'date_agenda',
        'date_letter',
        'from',
        'no_letter',
        'subject',
        'contact',
        'address',
        'file',
        'dept_disposition',
        'desc_disposition'
    ];

    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Pendis()
    {
        return $this->hasOne(pendis::class);
    }
}
