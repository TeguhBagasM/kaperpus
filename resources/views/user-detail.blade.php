@extends('layouts.mainlayout')

@section('title', 'User Detail')

@section('content')
    <div class="container">
        <div class="card shadow">
         <div class="card-header bg-primary text-light">
                <h4 class="my-3">User Lists</h4>
            </div>
            <div class="card-body p-3">
                @if (session('success-status'))
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    {{ session('success-status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="mb-3 d-flex justify-content-end">
                    @if ($userDetail->status == 'inactive')
                    <a href="/user-approve/{{ $userDetail->slug }}" class="btn btn-primary me-3"><i class="fa fa-check"></i> Approve</a>
                    @endif
                    <a href="/users" class="btn btn-dark"><i class="fa fa-sign-out"></i> Back</a>
                </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-info text-center">
                        <tr>
                            <th>Username</th>
                            <th>password</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $userDetail->username }}</td>
                            <td>******</td>
                            <td>
                                @if ($userDetail->phone)
                                {{ $userDetail->phone }}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $userDetail->status }}</td>
                            <td>{{ $userDetail->address }}</td>
                        </tr>
                    </tbody>
                </table>
            <div class="mt-5">
                <h3>Users Loan Log</h3>
                <x-loan-table :loans="$loans"/>
            </div>
            </div>
        </div>
    </div>
@endsection
