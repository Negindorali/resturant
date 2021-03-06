<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory,SoftDeletes;

    const
          TYPE="type",
          Name="name",
          PRICE="price",
          CATEGORY_ID ="category_id",
        NUTRIENTS ="nutrients",
        IMAGE = "image";

    protected $fillable = [
        self::TYPE,
        self::PRICE,
        self::Name,
        self::CATEGORY_ID,
        self::NUTRIENTS,
        self::IMAGE,

    ];
    protected $table="foods";


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likeable()
    {
        return $this->morphMany(Like::class,"likeable");
    }
}
