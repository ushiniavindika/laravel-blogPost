<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
      'category_id',
      'title',
      'slug',
      'description',
      'image',
      'created_by',
      'status'
   
    ];

    public function category()
    {
      return $this->belongsTo (Category::class,'category_id','id');
    }
}
