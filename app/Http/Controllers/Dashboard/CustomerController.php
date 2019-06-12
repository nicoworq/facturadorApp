<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller {

    public function index() {

        $customers = Customer::all();
        return view('customers.customers-view', ['customers' => $customers]);
    }

    public function create() {
        return view('customers.create-customers-view');
    }

    public function edit($id) {
        
    }

    public function view($id) {
        
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'cuit' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $customer = new Customer($request->input());

        $customer->save();

        return redirect('customers')->with('success', 'Usuario Creado correctamente!');
    }

}
