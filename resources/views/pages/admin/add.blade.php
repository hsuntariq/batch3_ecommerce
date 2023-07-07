<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-boot />
    <title>ADD product</title>
    <x-boot />
</head>

<body>
    <x-flash />
    <div class="row">
        <div class="col-lg-3">
            <x-admin_sidebar />
        </div>
        <div class="col-lg-9  my-5 ">
            <div class="display-5 text-center " style="color:hotpink">ADD PRODUCT</div>
            <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data"
                class="w-75 m-auto p-3" style="border:1px solid pink; border-radius:10px">
                @csrf
                <label for="">PRODUCT Name</label>
                <input class="form-control my-3" type="text" name="name">
                @error('name')
                    <p class="text-danger fw-bolder">
                        {{ $message }}
                    </p>
                @enderror
                <label for="">PRODUCT Price</label>
                <input class="form-control my-3" type="number" name="price">
                @error('price')
                    <p class="text-danger fw-bolder">
                        {{ $message }}
                    </p>
                @enderror
                <label for="">PRODUCT Category</label>
                <select class="form-control" name="category">
                    @foreach ($categories as $item)
                        <option value="{{ $item->category_name }}">
                            {{ $item->category_name }}
                        </option>
                    @endforeach
                </select>
                <input class="form-control my-3" type="file" name="image">
                @error('image')
                    <p class="text-danger fw-bolder">
                        {{ $message }}
                    </p>
                @enderror
                <input class="form-control my-3 btn btn-success" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <x-boot_js />
</body>

</html>
