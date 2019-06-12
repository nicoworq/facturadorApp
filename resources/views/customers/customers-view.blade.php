
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Clientes</span></h4>


@if (session('success'))

<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {{ session('success') }}
</div>

@endif

<a href="{{route('customer-create')}}" class="uk-button uk-button-primary">Crear cliente</a><br/><br/>

<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>

    @foreach ($customers as $customer)
    <div>
        <a href="{{route('customer-edit',['id'=>$customer->id])}}" class="uk-card uk-card-default uk-card-body uk-card-hover">
            <div class="uk-card-badge uk-label">Badge</div>
            <h3 class="uk-card-title">{{$customer->name}}</h3>
        </a>
    </div>


    @endforeach

</div>


@endsection