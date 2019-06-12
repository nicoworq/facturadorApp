<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Afip;

class Invoice extends Model {

    public function plan() {
        return $this->belongsTo('App\Plan');
    }

    public function getInvoiceInfoAfip($invoiceNumber) {

        $pointOfSale = env('AFIP_POINT_OF_SALE');
        $invoiceType = env('AFIP_INVOICE_TYPE');

        $afip = new Afip(array('CUIT' => env('AFIP_CUIT'), 'production' => TRUE));
        $res = $afip->ElectronicBilling->GetVoucherInfo($invoiceNumber, $pointOfSale, $invoiceType);
        return $res;
    }

    public function getLastInvoiceNumberAfip() {

        $pointOfSale = env('AFIP_POINT_OF_SALE');
        $invoiceType = env('AFIP_INVOICE_TYPE');

        $afip = new Afip(array('CUIT' => env('AFIP_CUIT'), 'production' => TRUE));
        $res = $afip->ElectronicBilling->GetLastVoucher($pointOfSale, $invoiceType);
        var_dump($res);
    }

    public function generateInvoiceAfip($dataVoucher) {

        $dataVoucher['ImpNeto'] = $dataVoucher['ImpTotal'];

        $dataDefault = array(
            'CantReg' => 1, // Cantidad de comprobantes a registrar
            'PtoVta' => env('AFIP_POINT_OF_SALE'), // Punto de venta
            //'CbteTipo' => 6, // Tipo de comprobante (ver tipos disponibles) 
            'Concepto' => 1, // Concepto del Comprobante: (1)Productos, (2)Servicios, (3)Productos y Servicios
            //'DocTipo' => 80, // Tipo de documento del comprador (ver tipos disponibles)
            //'DocNro' => 20111111112, // Numero de documento del comprador
            'CbteFch' => intval(date('Ymd')), // (Opcional) Fecha del comprobante (yyyymmdd) o fecha actual si es nulo
            //'ImpTotal' => 184.05, // Importe total del comprobante
            'ImpTotConc' => 0, // Importe neto no gravado
            'ImpNeto' => 0, // Importe neto gravado
            'ImpOpEx' => 0, // Importe exento de IVA
            'ImpIVA' => 0, //Importe total de IVA
            'ImpTrib' => 0, //Importe total de tributos
            'FchServDesde' => NULL, // (Opcional) Fecha de inicio del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchServHasta' => NULL, // (Opcional) Fecha de fin del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'FchVtoPago' => NULL, // (Opcional) Fecha de vencimiento del servicio (yyyymmdd), obligatorio para Concepto 2 y 3
            'MonId' => 'PES', //Tipo de moneda usada en el comprobante (ver tipos disponibles)('PES' para pesos argentinos) 
            'MonCotiz' => 1, // Cotización de la moneda usada (1 para pesos argentinos)  
        );

        $dataToSend = array_merge($dataDefault, $dataVoucher);

        $afip = new Afip(array('CUIT' => env('AFIP_CUIT'), 'production' => TRUE));
        $res = $afip->ElectronicBilling->CreateNextVoucher($dataToSend);

        return $res;
    }

}
