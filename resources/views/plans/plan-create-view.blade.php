
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Crear Nuevo Plan</span></h4>


@if ($errors->any())

@foreach ($errors->all() as $error)

<div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $error }}</p>
</div>

@endforeach

@endif

{{ Form::open(array('route' => 'plan-store')) }}

<fieldset class="uk-fieldset">

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Cliente*:</label>
        <div class="uk-form-controls">

            <select class="uk-select" name="customer_id">

                @foreach ($customers as $customer)

                <option value="{{$customer->id}}">{{$customer->name}}</option>

                @endforeach
            </select>

        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="form-stacked-select">Servicio*:</label>
        <div class="uk-form-controls">

            <select class="uk-select" name="service_id">

                @foreach ($services as $service)

                <option value="{{$service->id}}">{{$service->description}}</option>

                @endforeach
            </select>

        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-controls">
            <label class="uk-form-label" for="form-stacked-select">Descripcion *:</label>
            <textarea class="uk-input" name="description" rows="5"></textarea>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-form-controls">
            <label class="uk-form-label" for="form-stacked-select">Precio *:</label>
            <input class="uk-input" name="price" type="number"/>
        </div>
    </div>

    <div class="uk-margin">

        <div class="uk-form-controls">
            <label class="uk-form-label" for="form-stacked-select">Fecha desde *:</label>
            <input class="uk-input" name="begins_on" type="date" value="{{date("Y-m-d")}}"/>
        </div>
    </div>

    <div class="uk-margin">

        <div class="uk-form-controls">
            <label class="uk-form-label" for="form-stacked-select">Fecha hasta*:</label>
            <input class="uk-input" name="expires_on" type="date" value="{{ date("Y-m-d")}}"/>

        </div>
    </div>





</fieldset>

<button class="uk-button uk-button-default">Crear plan</button>


{{ Form::close() }}

@endsection