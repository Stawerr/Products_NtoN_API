<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'details'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
