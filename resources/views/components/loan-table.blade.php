<div>
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-info text-center">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Book Title</th>
                <th>Loan</th>
                <th>Return</th>
                <th>Actual Return</th>
            </tr>
        </thead>
        <tbody>
            @if (count($loans) > 0)
            @foreach ($loans as $index => $data)
            <tr class="{{ $data->actual_return_date == null ? 'table-warning' : ($data->return_date < $data->actual_return_date ? 'table-danger' : 'table-success') }} text-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->user->username }}</td>
                <td>{{ $data->book->title }}</td>
                <td>{{ $data->loan_date }}</td>                            
                <td>{{ $data->return_date }}</td>                            
                <td>
                @if ($data->actual_return_date != null)
                {{ $data->actual_return_date }}
                @else
                Not been returned
                @endif
                </td>                            
            </tr>
            @endforeach
            @else
            <tr class="text-center">
                <td colspan="7">No Data Available</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>