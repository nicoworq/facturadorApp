
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Ver Factura</span></h4>


@if (session('success'))

<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {{ session('success') }}
</div>

@endif


<dl class="uk-description-list uk-description-list-divider">
    <dt>Estado</dt>
    <dd class="ov-h">
        <div class='uk-label {{getStatusClass($invoice->plan->status->id)}}'>{{$invoice->plan->status->name}}</div>
        <div class="uk-button-group pull-right">
            <a class="uk-button uk-button-primary" href="{{route('plan-set-status',['id'=>$invoice->plan->id,'statusId'=>2])}}">Abonado</a>
            <a class="uk-button uk-button-secondary" href="{{route('plan-set-status',['id'=>$invoice->plan->id,'statusId'=>1])}}">No Abonado</a>
            <a class="uk-button uk-button-danger" href="{{route('plan-set-status',['id'=>$invoice->plan->id,'statusId'=>3])}}">Vencido</a>
        </div>
    </dd>
    <dt>Cliente:</dt>
    <dd> {{$invoice->plan->customer->name}}</dd>
    <dt>Descripcion:</dt>
    <dd> {{$invoice->plan->description}}</dd>
    <dt>Precio</dt>
    <dd> ${{number_format($invoice->amount,2)}}</dd>
</dl>

<h4 class="uk-heading-line uk-text-bold"><span>PDF</span></h4>

<a href="{{route('invoice-create-pdf',['invoiceId'=>$invoice->id])}}">Generar PDF</a>









@endsection

<?php

function getStatusClass($statusId) {
    switch ($statusId) {
        case 1:
            return 'uk-label-warning';
        case 2:
            return 'uk-label-success';
        case 3:
            return 'uk-label-danger';
    }
}
?>