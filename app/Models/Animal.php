<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'category',
        'name',
        'birthday',
        'gender',
        'weight',
        'image',
        'images',
        'animal_friendly',
        'vaccinated',
    ];

    /**
     * Animals' categories
     *
     * @var array
     */
    public const CATEGORIES = [
        'cats',
        'dogs'
    ];

    /**
     * Animals' genders
     *
     * @var array
     */
    public const GENDERS = [
        'male',
        'female'
    ];
}
