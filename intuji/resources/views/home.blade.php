<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>
<body>
    <form action="{{route('postBlog')}}" method='post'>
        @csrf
        <input type="text" name='title' placeholder='Tilte'><br>
        <input type="text" name='description' placeholder='Description'><br>
        <select name="category"><br>
            <option value="cat1">Category 1</option>
            <option value="cat2">Category 2</option>
            <option value="cat3">Category 3</option>
        </select>

        <input type="submit" value='submit blog'>
    </form>
    <br>

    <a href="{{route('showAll')}}">Show all blogs</a>
    <br>

    <a href="{{route('findPair')}}">Find Pair</a>



</body>
</html>