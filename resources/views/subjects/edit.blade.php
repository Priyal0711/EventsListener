@extends('layouts.app')
@section('style')
<style>
    .container1 {
        max-width: 800px;
        margin: 0 auto;
    }

    .content1 {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .form1 {
        text-align: center;
    }

    .table1 {
        width: 100%;
        border-collapse: collapse;
    }

    .table1 th,
    .table1 td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .table1 th {
        background-color: #f2f2f2;
    }

    .btn1 {
        text-align: center;
        margin-top: 20px;
    }

    .btn1 button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn1 button:hover {
        background-color: #0056b3;
    }
</style>
@endsection
@section('content1')
<main>
    <div class="container1">
        <button> <a href="{{ route('subject.show') }}">←Back</a> </button>
    <div class="content1">
        <form class="form1", method="post" action="{{ route('subject.update',$subject->id)}}">
            @csrf
            @method('PUT')
            <table class="table1">
                <th colspan="2">
                    <h1>Update Subject</h1>
                </th>

                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="ID" name="id" id="id" value="{{ $subject->id }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                            <input type="text" placeholder="Subject" name="subject" id="subject" value="{{ $subject->subject }}" >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="btn1">
                            <button type="submit" name="update" >Update Subject</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    </div>
    </div>
</main>
@endsection
