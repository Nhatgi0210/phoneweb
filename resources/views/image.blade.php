<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image</title>
</head>
<body>
    @if (session('message'))
    {!! session('message') !!}
    @endif
    <Form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="product_id" id="">
            @foreach ($products as $product)
                <option value="{{ $product->id}}">{{ $product->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="main_image">Hình chính</label>
        <input type="file" name="main_image" id="main_image" required>
        <br>
        <label for="images">Hình phụ</label>
        <input type="file" name="images[]" id="images" multiple required>
        <br>
        <input type="submit">
    </Form>
</body>
</html>