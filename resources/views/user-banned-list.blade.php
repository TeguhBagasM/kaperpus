@extends('layouts.mainlayout')

@section('title', 'Banned Users')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary text-light">
                <h4 class="my-3">Banned User Lists</h4>
            </div>
            <div class="card-body p-3">
                @if(session('success-status'))
                    <div class="alert alert-success">
                        {{ session('success-status') }}
                    </div>
                @elseif(session('danger-status'))
                    <div class="alert alert-danger">
                        {{ session('danger-status') }}
                    </div>
                @endif

                <div class="mb-3 d-flex justify-content-end">
                    <a href="/users" class="btn btn-dark me-3">
                        <i class="fa fa-sign-out"></i> Back</a>
                </div>

                <table class="table table-striped table-bordered">
                    <thead class="table-info text-center">
                            <tr>
                                <th>No</th>
                                <th>Userame</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($deletedUsers) > 0)
                            @foreach ($deletedUsers as $data)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                        <a href="user-restore/{{ $data->slug }}" class="btn btn-primary"><i class="fa fa-undo"></i> Restore</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-center">
                                    <td colspan="3">No data available</td>
                                </tr>
                                @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
