@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Evento XYZ</h1>
            <p class="lead">Evento destacadaço</p>
        </div>
    </div>
    <div class="px-3">
        <div class="d-flex">
            <h2>Populares</h2>
            <a href="#" class="ml-auto px-3 text-muted font-weight-bold font-sm" style="margin: auto 0;">Ver Mais</a>
        </div>
        <div class="row mr-auto">
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 my-3">
                <div>
                    <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid shadow rounded" alt="Titulo">
                </div>
                <div>
                    <div>Data</div>
                    <div>
                        <h3>Titulo</h3>
                        <div>
                            detalhes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection