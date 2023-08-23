<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Data</title>
        <style>
                        
                        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

       
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        .content {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

       
        .form {
            margin-top: 20px;
        }

        .table {
            width: 100%;
        }

        .table th {
            text-align: center;
            padding: 10px;
        }

        .table td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

       
        .btn {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        
        button a {
            text-decoration: none;
            color: white;
        }

       
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    

        </style>
    </head>
    <body>
        <main>
            <div class="container">

            <div class="content">
                <form class="form", method="post" action="{{ route('user.update',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <th colspan="2">
                            <h1>Update Data</h1>
                        </th>

                        <tr>
                            <td colspan="2">
                                <input type="text" placeholder="ID" name="id" id="id" value="{{ $data->id }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                    <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ $data->first_name }}" >
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="{{ $data->last_name }}" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" placeholder="E-mail" name="email" id="email" value="{{ $data->email }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" placeholder="City" name="city" id="city" value="{{ $data->city }}">
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="3">
                                <div class="btn">
                                    <button type="submit" name="update" >Update Data</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            </div>
            </div>
        </main>
    </body>
</html>
