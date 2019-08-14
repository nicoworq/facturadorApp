
@extends('base')

@section('content')

<h4 class="uk-heading-line uk-text-bold"><span>Planes</span></h4>


@if (session('success'))

<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    {{ session('success') }}
</div>

@endif

<a href="{{route('plan-create')}}" class="uk-button uk-button-default">Crear plan</a> <br/><br/>


<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>

    @foreach ($plans as $plan)
    <div>
        <a href="{{route('plan-edit',['id'=>$plan->id])}}" class="uk-card uk-card-default uk-card-body uk-card-hover">

            <div class="uk-card-badge uk-label {{  getStatusClass($plan->status->id)}}">{{$plan->status->name}}</div>
            <h3 class="uk-card-title">{{$plan->service->description}}</h3>
            <h4 class="uk-margin-remove">{{$plan->customer->name}} | {{showPeriod($plan)}} | ${{number_format($plan->price,2,',','.') }}</h4>


        </a>
    </div>


    @endforeach

</div>


@endsection

<?php

 function showPeriod($plan){

     $meses = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

     switch ($plan->period_id){
         case 1:
             // anual
             echo $plan->year;
             break;
         case 5:
             // mensual
             echo $meses[$plan->month];
             break;
         case 7:
         // diario
         echo "{$plan->days} días";
         break;
         case 8:
             // horario
             echo "{$plan->hours} horas";
             break;
     }

 }

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