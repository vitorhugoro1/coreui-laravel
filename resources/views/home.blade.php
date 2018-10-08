@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Evento XYZ</h1>
            <p class="lead">Evento destacadaço</p>
        </div>
    </div>
    <div class="px-3">
        <div class="d-flex">
            <h2>{{ __('Popular') }}</h2>
            <a href="#" class="ml-auto px-3 text-muted font-weight-bold font-sm" style="margin: auto 0;">{{ __('See More') }}</a>
        </div>
        <div class="row mr-auto">
            @includeWhen($championships->isNotEmpty(), 'components.championships-home', ['championships' => $championships])
        </div>
    </div>
@endsection