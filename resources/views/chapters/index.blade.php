@extends('layouts.app')

@section('content1')
<style>
   
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
    }
    th, td {
        padding: 10px;
        text-align: center;
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
        border-radius: 4px;
    }
    .action-button:hover {
        background-color: #0056b3;
    }

    
    form {
        display: inline-block;
    }
</style>

<h1 style="text-align: center">List of All Chapters</h1><br>
@if (session('access_type') == 'admin' || session('access_type') == 'teacher')
    <form style="text-align: center" action="{{ route('chapter.store') }}" method="POST">
        @csrf
        <label for="chapter">Add New Chapter : </label>
        <input type="text" name="chapter">
        <input type="submit" name="add_chap" value="Add Chapter" class="action-button">
    </form><br>
@endif
<div style="text-align: center;">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Chapter</th>
                @if (session('access_type') == 'admin' || session('access_type') == 'teacher')
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        @forelse ($chapter as $chap)
            <tr>
                <td>{{ $chap->id }}</td>
                <td>{{ $chap->chapter }}</td>
                @if (session('access_type') == 'admin' || session('access_type') == 'teacher')
                    <td>
                        @if ($chap->status)
                            Active
                        @else
                            Deactive
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('chapter.status', ['id' => $chap->id]) }}" method="post">
                            @csrf
                            <button name="status" class="action-button">
                                {{ $chap->status ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>

                    <td>
                    <button class="action-button" style="color: white;">
                    <a href="{{ route('chapter.edit', $chap->id) }}" style="text-decoration: none; color: inherit;">Edit</a>
                </button>

                    </td>

                    <td>
                        <form action="{{ route('chapter.delete', $chap->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="action-button">
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="{{ (session('access_type') == 'admin' || session('access_type') == 'teacher') ? '6' : '2' }}">There are no chapters!</td>
            </tr>
        @endforelse
    </table>
</div>
@endsection
