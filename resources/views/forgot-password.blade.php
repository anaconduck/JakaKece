<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('assets/css/forgot-password.css') }}" />
    <style>
        .reversed {
            display: inline-block;
            padding: 0.3em;
            padding-left: 0.4em;
            margin-left: 0.8em;
            position: relative;
            text-align: center;
            vertical-align: middle;
            line-height: 1;
            color: #fff;
            font-size: 12   px;
            background-color: #ef5350;
        }

        .reversed:before,
        .reversed:after {
            content: '';
            width: 0;
            height: 0;
            right: -0.8em;
            position: absolute;
            top: 0;
            border-top: 0.8em solid #ef5350;
        }

        .reversed:after {
            top: auto;
            bottom: 0;
            border-top: none;
            border-bottom: 0.8em solid #ef5350;
        }

        .reversedRight:before,
        .reversedRight:after {
            border-right: 0.8em solid transparent;
            right: -0.8em;
        }

        .reversedRight {
            width: 25px;
            border-radius: 5px 0px 0px 5px;
            animation: tilt 2s infinite;
        }

        @keyframes tilt {
            0% {
                left: 0%;
            }

            50% {
                left: 9px;
            }

            100% {
                left: 0px;
            }
        }

        .reversedLeft {
            margin-left: 15px;
            border-radius: 0px 5px 5px 0px;
        }

        .reversedLeft:before,
        .reversedLeft:after {
            content: '';
            width: 0;
            height: 0;
            border-left: 0.8em solid transparent;
            left: -0.8em;
            position: absolute;
        }

        .reversedLeft:after {
            top: auto;
            bottom: 0;
            border-top: 0.8em solid #ef5350;
            border-bottom: none;
        }

        .reversedLeft:before {
            bottom: auto;
            top: 0;
            border-bottom: 0.8em solid #ef5350;
            border-top: none;
        }

        .bgAnimation {
            background-color: #ef5350;
            background-image: linear-gradient(45deg, #e57373 25%, transparent 25%, transparent 75%, #e57373 75%, #e57373), linear-gradient(-45deg, #e57373 25%, transparent 25%, transparent 75%, #e57373 75%, #e57373);
            background-size: 60px 60px;
            animation: slide 4s infinite linear;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <div class="header">
                <h2 class="animation a1">Resetting Password</h2>
                <h4 class="animation a2">Enter your email</h4>
            </div>

            @error('email')
                <div id="InfoBanner" style="">
                    <span class="reversed reversedRight">
                        <span>
                            &#9888;
                        </span>
                    </span>
                    <span class="reversed reversedLeft">
                        {{ $message ??''}}
                    </span>
                </div>
            @enderror
            @if (session()->has('status'))
                {{ session()->get('status') }}
            @endif

            <form method="POST" action="">
                <div class="form">
                    @csrf
                    <input name="email" type="email" class="form-field animation a3" placeholder="Email Address">
                    <button class="animation a6">Submit</button>

                </div>
            </form>
        </div>
        <div class="right"></div>
    </div>
</body>

</html>
