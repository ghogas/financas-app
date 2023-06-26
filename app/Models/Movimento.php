<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;
    //campos  "autorizados para modificação"
    protected $fillable = ['descricao', 'valor', 'tipo', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
