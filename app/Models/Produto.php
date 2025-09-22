<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false; // desativa created_at e updated_at
    protected $fillable = ['nome', 'preco', 'marca', 'quantidade', 'descricao', 'imagem'];

}
