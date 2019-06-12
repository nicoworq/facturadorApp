
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Facturas</span></h4>


@if (session('success'))

<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {{ session('success') }}
</div>

@endif



<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>

    @foreach ($invoices as $invoice)
    <div>
        <a href="{{route('invoice-view',['id'=>$invoice->id])}}" class="uk-card uk-card-default uk-card-body uk-card-hover">
            <div class="uk-card-badge uk-label">Badge</div>
            <h3 class="uk-card-title">{{$invoice->plan->description}}</h3>
            <p>{{$invoice->invoice_number}}<br/>
                {{$invoice->plan->customer->name}}<br/>
                {{$invoice->created_at}}</p>
        </a>
    </div>


    @endforeach

</div>


@endsection