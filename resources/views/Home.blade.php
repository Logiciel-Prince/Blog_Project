    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Website Layout | CodingLab</title>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    </head>

    <body>
        <nav>
            <div class="menu">
                <div class="logo">
                    <a href="#">BlogLab</a>
                </div>
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a href="displayBlogRecords">Blog</a></li>
                    <li><a href="displayCategory">Category</a></li>
                    @if (empty(Auth::user()->id))
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Register</a></li>
                @endif
                </ul>
                @if (!empty(Auth::user()->id))
                    <a href="dashboard">
                        <li style="color: white">{{ Auth::user()->name }}</li>
                    </a>
                @endif
            </div>
        </nav>
        <div class="img"></div>
        <div class="center">
            <div class="title">Blog Website</div>
            <div class="sub_title">Welcome! to Blog Website</div>
        </div>
    </body>

    </html>
