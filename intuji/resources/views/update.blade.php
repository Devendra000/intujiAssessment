<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>
<body>
<form action="{{route('update',['id'=>$blogs->id])}}" method='post'>
        @csrf
        <input type="text" name='title' placeholder='title' value = '{{ $blogs->title }}'><br>
        <input type="text" name='description' placeholder='description' value = '{{ $blogs->description }}'><br>
        <select name="category">
            <option value="cat1" {{ $blogs->category === 'cat1' ? 'selected' : '' }}>Category 1</option>
            <option value="cat2" {{ $blogs->category === 'cat2' ? 'selected' : '' }}>Category 2</option>
            <option value="cat3" {{ $blogs->category === 'cat3' ? 'selected' : '' }}>Category 3</option>
        </select><br>

        <input type="submit" value='update blog'>
    </form>
</body>
</html>