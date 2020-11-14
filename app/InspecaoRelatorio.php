<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspecaoRelatorio extends Model
{
    protected $table = 'inspecao_relatorios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inspecao_id', 'relatorio',
    ];
}