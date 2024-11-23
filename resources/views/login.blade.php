<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NetXperia | Login Area </title>
    <link rel="icon" href="{{ asset('custom-asset/image/netxperia-logo.png') }}" type="image/png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <style>
        body {
            background: #000 !important;
        }

        .card {
            border: 1px solid #28a745;
        }

        .card-login {
            margin-top: 130px;
            padding: 15px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 0;
            border-bottom: 0;
        }

        .logo_title {
            font-size: 2rem;
            font-family: cursive;
            margin-top: 1rem;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #ff0000;
            color: #fff;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn {
            width: 130px;
        }

        .login_btn:hover {
            color: #fff;
            background-color: #ff0000;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #28a745;
            background-image: none;
            border-color: #28a745;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #28a745;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #28a745;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark pt-0 mt-0">
                <img src="https://www.netxperia.com/images/newlogo.png" alt="Logo">
                <h4 class="logo_title">Login Dashboard</h4>
            </div>

            @if(session('login_failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Message !</strong> {{ session('login_failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card-body">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <select name="user_type" id="user_type" class="form-control w-auto ">
                            <option value="">Select Employee</option>
                            <option value="admin">Admin</option>
                            <option value="vendor">Vendor</option>
                            <option value="client">Client</option>
                            <option value="employee">Employee</option>
                        </select>
                        @error('user_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" id="username" class="form-control w-auto" placeholder="Username" autocomplete="off">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control w-auto" placeholder="Password" autocomplete="off">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            @if(session('failed'))
            swal({
                title: "Login Failed!"
                , text: "{{ session('failed') }}"
                , icon: "error"
                , button: "OK"
            });
            @elseif(session('session_expire'))
            swal({
                title: "Login Failed!"
                , text: "{{ session('session_expire') }}"
                , icon: "error"
                , button: "OK"
            });
            @endif

            // Optional: Automatically hide the alert after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });

    </script>
</body>
</html>
