<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
                <form class="form" action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <table class="table">
                        <th colspan="2">
                            <h1>Login</h1>
                        </th>
                        <tr>
                            <td colspan="2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror " placeholder="E-mail" name="email" id="email" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="password" class="form-control" placeholder="Password" name="password" id="password" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="btn">
                                    <button type="submit" name="login">Login</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <p class="login">
                    Don't have an account? <a href="{{ route('user.register') }}">Register here</a>
                </p>
            </div>
        </div>
    </main>
</body>
</html>
