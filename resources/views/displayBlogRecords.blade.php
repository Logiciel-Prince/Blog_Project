<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ListingBlogRecord</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('common.nav');
<div class="my-12 table w-full p-2">
    <h5>Blog Records</h5>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        ID
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Title
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Image
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Description
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Categories
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Action
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogData as $data)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{ $data->id }}</td>
                    <td class="p-2 border-r">{{ $data->title }}</td>
                    <td class="p-2 border-r"><img width="100px" src="/blogimages/{{ $data->image }}" alt="">
                    </td>
                    <td class="p-2 border-r">{{ $data->description }}</td>
                    <?php
                    $test = json_decode($data->categories);
                    $comn = implode(',', $test);
                    ?>
                    <td class="p-2 border-r">{{ $comn }}</td>
                    <td>
                        @if (!empty(Auth::user()->id))
                            <a href="{{ 'blog/' . $data->id }}"
                                class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                            <a href="{{ 'displayBlogRecords/' . $data->id }}"
                                class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                        @else
                            <span>Performing Any Action <br>You Have to login first</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>{{ $blogData->links('pagi') }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ asset('blog') }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Add Record</a>

</div>

</html>
