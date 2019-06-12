<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Customer;
use App\Service;

class PlanController extends Controller {

    public function index() {

        $plans = Plan::all();
        return view('plans.plans-view', ['plans' => $plans]);
    }

    public function create() {

        $services = Service::all();
        $customers = Customer::all();

        return view('plans.plan-create-view', ['services' => $services, 'customers' => $customers]);
    }

    public function edit($id) {
        $plan = Plan::find($id);

        return view('plans.plan-edit-view', ['plan' => $plan]);
    }

    public function setStatus($id, $statusId) {
        $plan = Plan::find($id);

        $plan->plan_status_id = $statusId;

        $plan->save();

        return redirect("plans/edit/{$id}")->with('success', 'Estado seteado correctamente!');
    }

    public function view($id) {
        
    }

    public function store(Request $request) {

        $request->validate([
            'description' => 'required',
            'customer_id' => 'required',
            'service_id' => 'required',
            'price' => 'required',
            'begins_on' => 'required',
            'expires_on' => 'required',
        ]);

        $plan = new Plan($request->input());
        $plan->save();

        return redirect('plans')->with('success', 'Plan Creado correctamente!');
    }

}
