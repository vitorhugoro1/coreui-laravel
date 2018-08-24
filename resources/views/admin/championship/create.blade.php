@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Create Championship</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.roles.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required>
                                            @if($errors->has('title'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('title') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                                <option value="published" selected>Publish</option>
                                                <option value="drafted">Draft</option>
                                                <option value="deleted">Delete</option>
                                            </select>
                                            @if($errors->has('status'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('status') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="period">Event Periods</label>
                                            <date-range id="period" name="period" :makerequired="true"></date-range>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <ckeditor content="" id="content" name="content" :readonlymode="false"></ckeditor>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Localization</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="place">Place</label>
                                            <input type="text" name="place" id="place" class="form-control" placeholder="Find event place">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Subscription</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <event-ticket-selector :money='money'></event-ticket-selector>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#categories-options" role="tab" aria-controls="home" aria-selected="true">
                                                    <i class="icon-calculator"></i> Categories Options</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="categories-options" role="tabpanel">
                                                CAtegorieeeees
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('myscript')
    <script src="{{ asset('js/championship/app.js') }}"></script>
@endsection