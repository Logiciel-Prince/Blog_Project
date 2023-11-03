<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>categoryFormPage</title>
</head>

<body>
    @include('common.nav');
    @if (!empty($editData['id']))
        <form action="{{ url('updateCategory/' . $editData['id']) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1><strong>Category</strong> ADD-Page</h1>

            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" name="title" id="title"
                    value="{{ isset($editData['title']) ? $editData['title'] : '' }}" class="form-controll" />
            </div>
            <div class="form-group file-area">
                <label for="images">Images </label>
                <input type="file" name="image" id="images" required="required" />
                <div class="file-dummy">
                    <img width="50px" src="/categoryImages/{{ $editData->image }}" width="150px" alt="">
                    <div class="default">Please select file</div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="save">Save Category</button>
            </div>

        </form>
    @else
        <form action="{{ url('categoryForm') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h1><strong>Category</strong> ADD-Page</h1>

            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" name="title" id="title" class="form-controll" />
            </div>
            <div class="form-group file-area">
                <label for="images">Images </label>
                <input type="file" name="image" id="images" required="required" />
                <div class="file-dummy">
                    <div class="default">Please select file</div>
                </div>
            </div>
            @if (!empty(Auth::user()->id))
                <div class="form-group">
                    <button type="submit" name="save">Save Category</button>
                </div>
            @else
                <span>Please Login,Then After Your are able to Add Category</span>
            @endif
        </form>

        <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet'
            type='text/css'>
    @endif
</body>

</html>
