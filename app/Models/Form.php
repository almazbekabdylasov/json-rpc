<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
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

    public function answer()
    {
        return $this->hasOne(Answer::class, 'form_uid', 'form_uid');
    }
}
