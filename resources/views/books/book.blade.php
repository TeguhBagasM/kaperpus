@extends('layouts.mainlayout')

@section('title', 'Books')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-light">
            <h4 class="my-3">Book List</h4>
        </div>
        <div class="card-body p-3">
            @if (session('success-status'))
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                {{ session('success-status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('danger-status'))
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                {{ session('danger-status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="mb-3 d-flex justify-content-end">
                <a href="book-deleted-list" class="btn btn-dark me-3"><i class="fa fa-eye"></i> View Deleted Data</a>
                <a href="book-add" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered mt-4">
                    <thead class="table-info text-center">
                        <tr>
                            <th>No</th>
                            <th>Book Code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Cover</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookList as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->book_code }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->author }}</td>
                            <td>
                                @foreach ($data->categories as $category)
                                <span>{{ $category->name }}</span>,
                                @endforeach
                            </td>
                            <td>
                                @if ($data->cover)
                                <img src="{{ asset('storage/cover/'.$data->cover) }}" width="100px" height="110px">
                                @else
                                <img src="{{ asset('assets/img/cover-not-available.jpg') }}" width="100px" height="110px" alt="">
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/book-edit/'.$data->slug) }}" class="btn btn-primary"><i class="fa fa-pencil" title="Update"></i></a>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}"><i class="fa fa-trash" title="Delete"></i></button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the book "<strong>{{ $data->title }}</strong>"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ url('/book-delete/'.$data->slug) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        
                        @empty
                        <tr class="text-center">
                            <td colspan="7">No Data Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

@endsection
