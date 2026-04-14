<!DOCTYPE html>
<html>

<head>
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 2, 72, 0.2);
            /* border-left: 5px solid #000248; */
        }

        h2 {
            color: #000248;
            font-size: 22px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background: #000248;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #232386;
        }

        .divider {
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <p>{!! $content !!}</p>
        <div class="divider"></div>

        <div class="footer">
            <p>
                @lang('gen.you_can_view_the_order')
            </p>
            <a href="{{ $viewOrderUrl }}" class="btn">
                @lang('gen.view_order')
            </a>
        </div>
    </div>

</body>

</html>
