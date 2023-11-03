<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ListingCategoryRecord</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('common.nav');
    <div class="my-12 table w-full p-2">
        <h5>category Records</h5>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            S.No
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
                            Action
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryData as $data)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r">{{ $data->id }}</td>
                        <td class="p-2 border-r">{{ $data->title }}</td>
                        <td class="p-2 border-r"><img width="100px" src="/categoryImages/{{ $data->image }}"
                                alt=""></td>

                        <td>
                            @if (!empty(Auth::user()->id))
                                <a href="{{ 'category/' . $data->id }}"
                                    class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                <a href="{{ 'displayCategory/' . $data->id }}"
                                    class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                            @else
                                <span>Performing Any Action<br> You have to login</span>
                        </td>
                @endif
                </tr>
                @endforeach
                <tr>
                    <td>{{ $categoryData->links('pagi') }}</td>
                </tr>

            </tbody>
        </table>
        <a href="{{ asset('category') }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Add
            Record</a>


    </div>
</body>

</html>
