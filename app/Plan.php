<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model {

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function service() {
        return $this->belongsTo('App\Service');
    }

    public function status() {
        return $this->belongsTo('App\PlanStatus','plan_status_id');
    }
    
    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

    public function period() {
        return $this->belongsTo('App\Period');
    }
}
