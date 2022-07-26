<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    protected static function booted()
    {
        static::deleting(function ($product) {
            if ($product->products()->exists()) {
                throw new \Exception('Related products found');
            }
        });
    }
}
