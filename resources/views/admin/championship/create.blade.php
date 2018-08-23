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
                                            <date-range id="period" name="period" :makeRequired="true"></date-range>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <ckeditor content="" id="content" name="content" :readonlymode="false"></ckeditor>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Subscription</h3>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <event-ticket-selector></event-ticket-selector>
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