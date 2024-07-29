@extends('layouts.mainlayout')

@section('title', 'Loan Books')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
    <div class=" row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Loan Books</h4>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert {{ session('alert-class') }}">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="loan" class="btn btn-dark me-3"><i class="fa fa-eye"></i> View Loan Logs</a>
                    </div>
        <form action="loans" method="post">
            @csrf
            <div class="form-group row mt-3">
                <label for="user" class="col-sm-2">User</label>
                <div class="col-sm-10">
                    <select name="user_id" id="user_id" class="form-control input-box">
                        <option value="" disabled selected>Choose users</option>  
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="book" class="col-sm-2">Book</label>
                    <div class="col-sm-10">
                    <select name="book_id" id="book_id" class="form-control input-box">
                        <option value="" disabled selected>Choose books</option>  
                        @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} - {{ $book->book_code }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
        <div class="form-group row mt-3">
            <div class="col-sm-10 offset-sm-2">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="categories" class="btn btn-dark">Back</a>
            </div>
        </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.input-box').select2();
    });
</script>
@endsection