@extends('layouts.mainlayout')

@section('title', 'Category Update')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Category Update</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <form action="/category-edit/{{ $categoryUpdate->slug }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ $categoryUpdate->name }}" class="form-control form-control-warning" id="name">
                </div>
            </div>

        <div class="form-group row mt-3">
            <div class="col-sm-10 offset-sm-2">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="/categories" class="btn btn-dark">Back</a>
            </div>
        </div>
</form>
</div>
@endsection