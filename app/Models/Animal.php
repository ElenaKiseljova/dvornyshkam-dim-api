<?php

namespace App\Models;

use App\Models\Scopes\AllowedFilterSearch;
use App\Models\Scopes\AllowedSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Animal extends Model
{

    use HasFactory, SoftDeletes, AllowedSort, AllowedFilterSearch;

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
        'description',
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

    public function fileUrl(): string
    {
        return $this->image ? Storage::url($this->image) : asset('storage/placeholder-image.jpg');
    }

    public static function makeDirectory()
    {
        $subFolder = 'animals/' .  date('Y/m/d');

        Storage::makeDirectory($subFolder);

        return $subFolder;
    }
}
