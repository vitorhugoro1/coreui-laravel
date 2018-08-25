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
                                    <div class="form-group col-lg-6">
                                        <label for="period">Event Period</label>
                                        <date-range id="period" name="period" :makerequired="true"></date-range>
                                    </div>
                                    <div class="col-lg-3">
                                        {{-- @TODO Add recorrence --}}
                                        {{-- <event-date-selector></event-date-selector> --}}
                                        <div class="form-group">
                                            <label for="all_day">All Day</label>
                                            <div>
                                                <div class="form-chec form-check-inline">
                                                    <input type="checkbox" class="form-check-label" name="all_day" id="all_day">
                                                </div>
                                            </div>
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
                                        <h3>Organization</h3>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#organizations" role="tab" aria-controls="home" aria-selected="true">
                                                    <i class="icon-calculator"></i> Organizations</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="organizations" role="tabpanel">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Contact</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">E-mail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">#01</th>
                                                            <td>Skigawk</td>
                                                            <td>(+55) 11 2556-5631</td>
                                                            <td>Rua Nestor Pestana, xxx - Sao Paulo, Brazil</td>
                                                            <td>email@email.com</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="col">#ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Contact</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">E-mail</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <button type="button" class="btn btn-outline-secondary">Add an Organizator</button>
                                            </div>
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
                                    <div class="col-lg-12">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#categories-modalities" role="tab" aria-controls="home" aria-selected="true">
                                                    <i class="icon-calculator"></i> Modalities</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#categories-options" role="tab">
                                                    <i class="icon-calculator"></i> Settings</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="categories-modalities" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="modalities">Modalities</label>
                                                            <v-select v-model="modalitiesModel" inputId="modalities"
                                                            :options="[{label: 'teste', value: 'teste'}]" multiple placeholder="Select an Modalities"></v-select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="fight_level">Fight Level</label>
                                                            <v-select v-model="fight_level" inputId="fight_level" :options="[]" multiple placeholder="Select an Fight Level"></v-select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="age_bracket">Age Bracket</label>
                                                            <v-select v-model="age_bracket" inputId="age_bracket" :options="[]" multiple placeholder="Select an Age Bracket"></v-select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="categories-options" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="limit_per_user">Limit Per User</label>
                                                            <input type="text" class="form-control" name="limit_per_user" id="limit_per_user" value="0">
                                                            <small class="text-muted">If 0 or empty the user not will has limit of modalities per subscription</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-2">
                                        <h3>Details</h3>
                                    </div>
                                    <div class="col-lg-12 mb-4">
                                        <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                        </div>
                                        <div class="form-group">
                                            <label for="terms">Service Terms</label>
                                            <button type="button" class="btn btn-outline-success form-control">Service Terms</button>
                                            {{-- Open a modal with all terms added --}}
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