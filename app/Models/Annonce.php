<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'localisation',
        'code_postal',
        'image',
        'price',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
