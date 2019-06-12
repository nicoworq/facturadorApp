
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Generar factura</span></h4>


@if ($errors->any())

@foreach ($errors->all() as $error)

<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $error }}</p>
</div>

@endforeach

@endif

<dl class="uk-description-list uk-description-list-divider">

    <dt>Cliente:</dt>
    <dd> {{$plan->customer->name}}</dd>
    <dt>Servicio:</dt>
    <dd> {{$plan->service->description}}</dd>
    <dt>Descripcion Plan:</dt>
    <dd> {{$plan->description}}</dd>

</dl>

<form method="POST" action="{{route('invoice-store',['planId'=>$plan->id])}}">
    @csrf
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Tipo de Comprobante:</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="CbteTipo">
                    <option value='11' selected="selected">Factura C</option>
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Concepto:</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="Concepto">
                    <option value='1' selected="selected">Productos</option>
                    <option value='2'>Servicios</option>
                    <option value='3'>Productos y Servicios</option>
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Tipo documento :</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="DocTipo">
                    <option value='80' selected="selected">CUIT</option>
                </select>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Nro documento:</label>
            <div class="uk-form-controls">
                <input type="number" class="uk-input" name="DocNro" value="{{$plan->customer->cuit}}"/>

            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">Importe Total:</label>
            <div class="uk-form-controls">
                <input type="number" class="uk-input" name="ImpTotal" value="{{$plan->price}}"/>
            </div>
        </div>

    </fieldset>

    <button class="uk-button uk-button-primary">Crear factura</button>


</form>

@endsection