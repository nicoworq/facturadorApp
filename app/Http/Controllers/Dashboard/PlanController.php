<?php

namespace App\Http\Controllers\Dashboard;

use App\Period;
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
        $periods = Period::all();

        return view('plans.plan-create-view', ['services' => $services, 'customers' => $customers, 'periods'=>$periods]);
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
            'customer_id' => 'required',
            'service_id' => 'required',
            'price' => 'required',
            'period_id' => 'required'
        ]);

        // mes batch

        if((int)$request->get('period_id') == 5){
            //periodo mensual

            // veo si hay desde y hasta

            if($request->has('from') && $request->has('to')){
                // tengo desde y hasta. calculo la dif en meses
                $from = $request->get('from');
                $to = $request->get('to');

                $fromDate = date_create_from_format('Y-m-d',$from);
                $toDate = date_create_from_format('Y-m-d',$to);

                $diff = $fromDate->diff($toDate);
                var_dump($diff->format('%m'));die();

            }

        }

        $plan = new Plan($request->input());

        if($request->has('month')){
            $month = $request->get('month');
            $monthDate = date_create_from_format('Y-m',$month);
            $plan->month = $monthDate->format('m');
        }

        $plan->save();

        return redirect('plans')->with('success', 'Plan Creado correctamente!');
    }

    private function insertPlan(){



    }

}
