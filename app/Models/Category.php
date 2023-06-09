<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id')->withDefault();
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function child()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
