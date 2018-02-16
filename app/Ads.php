<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
class Ads extends Model
{
    protected $fillable = ['title', 'created_at', 'updated_at', 'user_id', 'status', 'cat_id', 'description', 'contact_no', 'country', 'city', 'area', 'related_area', 'street_address', 'price_per_day'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
}
