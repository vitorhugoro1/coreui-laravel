@foreach($championships as $championship)
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
@endforeach