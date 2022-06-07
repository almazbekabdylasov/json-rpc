<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['form_uid', 'answers'];

    protected $table = 'answers';

    public function form()
    {
        return $this->hasOne(Form::class, 'form_uid', 'form_uid');
    }
}
