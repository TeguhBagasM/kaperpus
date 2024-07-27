@extends('layouts.mainlayout')

@section('title', 'Add new Category')

@section('content')
<div class="container-fluid">
    <div class=" row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Add New Category</h4>
                </div>
                <div class="card-body">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
        <form action="create-category" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
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
@endsection