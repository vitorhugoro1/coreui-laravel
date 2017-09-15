@extends('master')
@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Bootstrap Modals
                </div>
                <div class="card-block">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                        Launch demo modal
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#largeModal">
                        Launch large modal
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#smallModal">
                        Launch small modal
                    </button>
                    <hr>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primaryModal">
                        Primary modal
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#successModal">
                        Success modal
                    </button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#warningModal">
                        Warning modal
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dangerModal">
                        Danger modal
                    </button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal">
                        Info modal
                    </button>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>

@endsection