@extends('layouts.app')

@section('content1')
<style>
  
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }

    .action-button {
        display: inline-block;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
    .action-button:hover {
        background-color: #0056b3;
    }

</style>

<h1 style="text-align: center">List Of All Users</h1><br>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    @forelse ($userdatas as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->first_name }}</td>
            <td>{{ $data->last_name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->city }}</td>
            <td><a href="{{ route('user.display', $data->id) }}" class="action-button">Show</a></td>
            <td><a href="{{ route('user.edit', $data->id) }}" class="action-button">Edit</a></td>
            <td>
                <form action="{{ route('user.delete', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="action-button">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">There are no data!</td>
        </tr>
    @endforelse
</table>
@endsection

