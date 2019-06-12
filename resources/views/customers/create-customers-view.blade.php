
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Crear Nuevo Cliente</span></h4>


@if ($errors->any())

@foreach ($errors->all() as $error)

<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $error }}</p>
</div>

@endforeach

@endif

{{ Form::open(array('route' => 'customer-store')) }}

<fieldset class="uk-fieldset">

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Nombre*:</label>
        <div class="uk-form-controls">
            <input type="text" class="uk-input" name="name" value=""/>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Cuit*:</label>
        <div class="uk-form-controls">
            <input type="number" class="uk-input" name="cuit" value=""/>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Email*:</label>
        <div class="uk-form-controls">
            <input type="email" class="uk-input" name="email" value=""/>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Dirección:</label>
        <div class="uk-form-controls">
            <input type="text" class="uk-input" name="address" value=""/>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Ciudad:</label>
        <div class="uk-form-controls">
            <input type="text" class="uk-input" name="city" value=""/>
        </div>
    </div>




</fieldset>

<button class="uk-button uk-button-default">Crear cliente</button>


{{ Form::close() }}

@endsection