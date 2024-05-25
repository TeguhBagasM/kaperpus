@extends('layouts.mainlayout')

@section('title', 'Update Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
    <div class=" row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Update Book</h4>
                </div>
                <div class="card-body">
                    <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="book_code">Book Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="book_code" value="{{ $book->book_code }}" class="form-control" id="book_code">
                                    @error('book_code')
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="title">Book Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{ $book->title }}" id="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="author">Author</label>
                            <div class="col-sm-10">
                                <input type="text" name="author" class="form-control" value="{{ $book->author }}" id="author">
                                    @error('author')
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="publisher">Publisher</label>
                            <div class="col-sm-10">
                                <input type="text" name="publisher" class="form-control" value="{{ $book->publisher }}" id="publisher">
                                @error('publisher')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="cover">Previous Cover</label>
                            <div class="col-sm-10">
                                @if($book->cover != '')
                                <img src="{{asset('storage/cover/'.$book->cover)}}" width="120px" height="150px">
                                @else
                                <img src="{{asset('assets/img/cover-not-available.jpg')}}" width="100px" height="110px" alt="">
                                @endif
                               
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="image">image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="cover">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="category" class="col-sm-2">Category</label>
                            <div class="col-sm-10">
                              <select name="categories[]" id="categories" class="form-control select-multiple" multiple>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        <div class="form-group row mt-3">
                            <label for="currentCategory" class="col-sm-2">Current Category</label>
                            <ul class="col-sm-10">
                                @foreach ($book->categories as $category)
                                <li>
                                    {{ $category->name }}
                                </li>
                                @endforeach
                            </ul>
                          </div>
                          

                    <div class="form-group row mt-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="/books" class="btn btn-dark">Back</a>
                        </div>
                    </div>
            </form>
            </div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select-multiple').select2();
    });
</script>
            @endsection