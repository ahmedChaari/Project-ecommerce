<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
 
    protected $fillable =['name','description','content','image','price','published_at','price_promo','category_id'];
    
   
public function getRouteKeyName()
{
    return 'name';
}


    public function deleteImage()
        {

            Storage::delete($this->image);
        }



    public function category()
        {
            return $this->belongsTo(Category::class);
        }
}

