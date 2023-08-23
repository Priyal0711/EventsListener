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

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

       
        .btn {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        
        .text-danger {
            color: red;
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
                <button> <a href="{{ route('user.show') }}">←Back</a> </button>
            <div class="content">
                <form class="form", method="post" action="{{ route('user.update',$data->id)}}">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <th colspan="2">
                            <h1>Display Data</h1>
                        </th>

                        <tr>
                            <td colspan="2">
                                <input type="text" placeholder="ID" name="id" id="id" value="{{ $data->id }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                    <input type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ $data->first_name }}" readonly>
                                </div>
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

            </div>
            </div>
        </main>
    </body>
</html>
