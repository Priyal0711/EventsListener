@extends('layouts.app')
@section('style')
<style>
     .container1 {
        text-align: center;
        margin-top: 50px;
    }

    .content1 {
        display: inline-block;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form1 {
        text-align: left;
    }

    .table1 {
        width: 100%;
        margin-top: 20px;
    }

    .table1 th {
        padding: 10px;
    }

    .table1 input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    .btn1 button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 3px;
    }

    .btn1 button:hover {
        background-color: #0056b3;
    }
   
</style>
@endsection
@section('content1')
<main>
    <div class="container1">
        <button><a href="{{ route('chapter.show') }}">←Back</a></button>
        <div class="content1">
            <form class="form1" method="post" action="{{ route('chapter.update', $chapter->id) }}">
                @csrf
                @method('PUT')
                <table class="table1">
                    <tr>
                        <th colspan="2">
                            <h1>Update Chapter</h1>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="ID" name="id" id="id" value="{{ $chapter->id }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="Chapter" name="chapter" id="chapter" value="{{ $chapter->chapter }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn1">
                                <button type="submit" name="update">Update Data</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</main>

@endsection
