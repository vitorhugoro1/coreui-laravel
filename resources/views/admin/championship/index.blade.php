@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="animate fadeIn">
            <h1>Championships</h1>

            @includeWhen(session('message'), 'helpers.alert', [ 'type' => 'success' ])

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-outline-primary" href="{{ route('admin.championships.create') }}">Create</a>
                            <table class="table table-striped table-responsive-sm mt-2">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($championships as $championship)
                                    <tr>
                                        <td>{{ $championship->title }}</td>
                                        <td>{{ $championship->status }}</td>
                                        <td>{{ optional($championship->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.championships.edit', $championship->id) }}`" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                @hasallroles('admin|collaborator')
                                                    @if(auth()->user()->isCollaborator() && $championship->createdByMe() ||
                                                        auth()->user()->isAdmin())
                                                        <a class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                @endhasallroles
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $championships->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection