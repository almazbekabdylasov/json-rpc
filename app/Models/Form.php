<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'forms';
    protected $fillable = ['name', 'form_uid'];
    use HasFactory;

    public function inputs()
    {
        return $this->hasMany(Input::class, 'form_uid', 'form_uid');
    }

    public function textarea()
    {
        return $this->hasMany(Textarea::class, 'form_uid', 'form_uid');
    }

    public function selects()
    {
        return $this->hasMany(Select::class,'form_uid', 'form_uid');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'form_uid', 'form_uid');
    }
}
