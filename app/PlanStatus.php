<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanStatus extends Model {

    protected $table = 'plan_statuses';
    protected $guard = ['id', 'created_at', 'updated_at'];

    public function plans() {
        $this->hasMany('App\Plan','plan_status_id','id');
    }

}
