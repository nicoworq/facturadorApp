<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;
use App\Customer;
use App\Service;
use App\Invoice;

class InvoiceController extends Controller {

    public function index() {

        $invoices = Invoice::all();
        return view('invoices.invoices-view', ['invoices' => $invoices]);
    }

    public function create($planId) {

        $plan = Plan::find($planId);

        return view('invoices.invoice-create-view', ['plan' => $plan]);
    }

    public function store($planID, Request $request) {

        $invoice = new Invoice();

        $afipResponse = $invoice->generateInvoiceAfip($request->input());

        if ($afipResponse) {

            $CAE = $afipResponse['CAE'];

            $invoiceNumber = $afipResponse['voucher_number'];

            $invoice->plan_id = $planID;
            $invoice->cae = $CAE;
            $invoice->amount = $request->input('ImpTotal');
            $invoice->invoice_number = $invoiceNumber;
            $invoice->point_of_sale_number = env('AFIP_POINT_OF_SALE');
            $invoice->point_of_sale_number = env('AFIP_POINT_OF_SALE');

            $invoice->save();

            return redirect('invoices')->with('success', 'Factura Creada correctamente!');
        }
    }

    public function view($id) {
        $invoice = Invoice::find($id);

        return view('invoices.invoice-view', ['invoice' => $invoice]);
    }

    public function createPDF($invoiceID) {

        $invoice = Invoice::find($invoiceID);

        return view('invoices.invoice-view-pdf', ['invoice' => $invoice]);
    }

}
