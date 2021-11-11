<?php

namespace App\Models;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'orignal_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'cate_id','id');
    }
}
