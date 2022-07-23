<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "blogs";
    protected $fillable = ["category_id", "name", "image", "text", "name_seo", "created_at", "updated_at"];

    public function getCategory(){
        return $this->hasOne(Categories::class, "id", "category_id");
    }

}
