<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New User</title>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #3498db;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .login {
            text-align: center;
            margin-top: 10px;
        }
           
        </style>
    </head>
    <body>
        <main>
            <div class="container">
            <div class="content">
                <form class="form", method="post" action="{{ route('user.add') }}" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <th colspan="2">
                            <h1>Add New User</h1>
                        </th>
                        <tr class="tr">
                            <td colspan="2">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" name="first_name" id="first_name" >
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" name="last_name" id="last_name" >
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="E-mail" name="email" id="email" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" class="form-control @error('state') is-invalid @enderror " placeholder="State" name="state" id="state">
                                @if ($errors->has('state'))
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <label for="access_type">Select Access Type : </label>
                                <select name="access_type"  id="access_type">
                                @foreach ($access_type as $access)
                                    <option value="{{ $access->id }}">{{ $access->access_type }}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="file" class="form-control @error('profileimage') is-invalid @enderror " name="profileimage" id="profileimage">
                                @if ($errors->has('profileimage'))
                                    <span class="text-danger">{{ $errors->first('profileimage') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="inpt" colspan="2">
                                <input type="text" class="form-control @error('user_name') is-invalid @enderror " placeholder="User Name" name="user_name" id="user_name">
                                @if ($errors->has('user_name'))
                                    <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" name="password" id="password" >
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="btn">
                                    <button type="submit" name="add" >Add User</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            </div>
        </main>
    </body>
</html>
