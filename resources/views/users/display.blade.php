<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th, .table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            text-align: left;
            font-weight: bold;
        }

        .form input[type="text"],
        .form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .form input[type="text"]:read-only,
        .form input[type="email"]:read-only {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .form h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <form class="form" method="post" action="{{ route('user.update',$data->id)}}">
                @csrf
                @method('PUT')
                <table class="table">
                    <tr>
                        <th colspan="2">
                            <h1>Display Data</h1>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="ID" name="id" id="id" value="{{ $data->id }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ $data->first_name }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="{{ $data->last_name }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="email" placeholder="E-mail" name="email" id="email" value="{{ $data->email }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="inpt" colspan="2">
                            <input type="text" placeholder="City" name="city" id="city" value="{{ $data->city }}" readonly>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>
</html>
