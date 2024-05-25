@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')

<div class="container">
    <div class="card shadow">
     <div class="card-header bg-primary text-light">
            <h4 class="my-3">Your Loan Logs</h4>
        </div>
        <div class="card-body p-3">
            <div class="mb-3 d-flex justify-content-end">
                <a href="/loans" class="btn btn-primary"><i class="fa fa-sign-in"></i> Back</a>
            </div>

    <div class="row">
        <div class="col-md-12">
            <x-loan-table :loans="$loans"/>
        </div>
    </div>
</div>

@endsection