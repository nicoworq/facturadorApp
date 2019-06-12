<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email','cuit','address','city'
    ];
    
    
    public function plans(){
        return $this->hasMany('App\Plan');
    }
    
}
