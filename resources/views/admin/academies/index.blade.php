@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Academies</h1>

            @includeWhen(session('message'), 'helpers.alert', [ 'type' => 'success' ])

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-outline-primary" href="{{ route('admin.academies.create') }}">Create</a>
                            <table class="table table-striped table-responsive-sm mt-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($academies as $academy)
                                    <tr>
                                        <td>{{ $academy->name }}</td>
                                        <td>{{ $academy->address_1 }}</td>
                                        <td>{{ $academy->master ?? '-' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @hasallroles('admin|collaborator')
                                                    <a href="{{ route('admin.academies.edit', $academy->id) }}`" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                    @if(auth()->user()->isCollaborator() && $academy->createdByMe() ||
                                                        auth()->user()->isAdmin())
                                                        <a class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                @endhasallroles
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Not has academies</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{ $academies->links() }}
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