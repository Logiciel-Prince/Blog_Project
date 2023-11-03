<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>blogFormPage</title>
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>

<body>
    @include('common.nav');
    <header>
        <div class="text-box">
            <p id="description">Blog ADD-page</p>
        </div>
    </header>
    <div class="container">
        @if (!empty($editData['id']))
            <form action="{{ url('updateForm/' . $editData['id']) }}". id="survey-form" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="labels">
                    <label id="name-label" for="name">Title</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" id="name" name="title"
                        value="{{ isset($editData['title']) ? $editData['title'] : '' }}"placeholder="Enter your title"
                        required autofocus>
                </div>

                <div class="labels">
                    <label id="email-label" for="file">Image</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="file" id="file" name="image" required><img
                        src="/blogimages/{{ $editData->image }}" width="150px" alt="">
                </div>


                <div class="labels">
                    <label for="dropdown">Select Multiple Category</label>
                </div>
                <div class="input-tab">
                    <?php
                    $test = json_decode($editData->categories);
                    ?>
                    <select class="selectpicker" name="categories[]" multiple="multiple">
                        <option>Select an option</option>
                        <option value="clothes"{{ in_array('clothes', $test) ? 'selected' : '' }}>Clothes</option>
                        <option value="food"{{ in_array('food', $test) ? 'selected' : '' }}>Food</option>
                        <option value="Mobile"{{ in_array('Mobile', $test) ? 'selected' : '' }}>Mobile</option>
                        <option value="cars"{{ in_array('cars', $test) ? 'selected' : '' }}>Cars</option>
                        <option value="tvLed"{{ in_array('tvLed', $test) ? 'selected' : '' }}>TvLed</option>
                    </select>
                    <h6>Hold down the Ctrl (windows) /
                        Command (Mac) button to select multiple options.</h6>
                </div>


                <div class="labels">
                    <label for="comments">Tell us more about your Title</label>
                </div>
                <div class="input-tab">
                    <textarea class="input-field" id="comments" name="description" rows="10" cols="40"
                        placeholder="Your words...">
                    {{ isset($editData['description']) ? $editData['description'] : '' }}</textarea>
                </div>

                <div class="btn">
                    <button id="submit" type="submit">Submit</button>
                </div>

            </form>
        @else
            <form action="formSave" id="survey-form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="labels">
                    <label id="name-label" for="name">Title</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="text" id="name" name="title"
                        placeholder="Enter your title" required autofocus>
                </div>

                <div class="labels">
                    <label id="email-label" for="file">Image</label>
                </div>
                <div class="input-tab">
                    <input class="input-field" type="file" id="file" name="image" required>
                </div>


                <div class="labels">
                    <label for="dropdown">Select Multiple Category</label>
                </div>
                <div class="input-tab">
                    <select id="dropdown" name="categories[]" multiple="multiple">
                        <option>Select an option</option>
                        <option value="clothes">Clothes</option>
                        <option value="food">Food</option>
                        <option value="Mobile">Mobile</option>
                        <option value="cars">Cars</option>
                        <option value="tvLed">TvLed</option>
                    </select>
                    <h6>Hold down the Ctrl (windows) /
                        Command (Mac) button to select multiple options.</h6>
                </div>


                <div class="labels">
                    <label for="comments">Tell us more about your Title</label>
                </div>
                <div class="input-tab">
                    <textarea class="input-field" id="comments" name="description" rows="10" cols="40"
                        placeholder="Your words..."></textarea>
                </div>
                @if (!empty(Auth::user()->id))
                    <div class="btn">
                        <button id="submit" type="submit">Submit</button>
                    </div>
                @else
                    <span> <b>Please Login,Then After Your are able to Add blog</b></span>
                @endif

            </form>
        @endif
    </div>

    <footer>
        <div class="contact">
            <a href="https://github.com/linh4" target="_blank">
                <span class="icon"><i class="fa fa-github"></i></span></a>
            <a href="https://codepen.io/linh4/" target="_blank">
                <span class="icon"><i class="fa fa-codepen"></i></span></a>
            <a href="https://www.freecodecamp.org/linh4" target="_blank">
                <span class="icon"><i class="fa fa-free-code-camp"></i></span></a>
        </div>
        <p>&copy 2018 Linh Huynh</a></p>
    </footer>

</body>

</html>
