<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model {

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function plans() {
        return $this->hasMany('App\Plan');
    }

}
