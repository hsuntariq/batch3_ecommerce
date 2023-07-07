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
            <div class="display-5 text-center " style="color:hotpink">ADD CATEGORY</div>
            <form action="/add-category" method="POST" enctype="multipart/form-data" class="w-75 m-auto p-3"
                style="border:1px solid pink; border-radius:10px">
                @csrf
                <label for="">PRODUCT Category</label>
                <input class="form-control my-3" type="text" name="category_name">
                @error('name')
                    <p class="text-danger fw-bolder">
                        {{ $message }}
                    </p>
                @enderror
                <input type="file" name="category_image" id="" class="form-control">
                <input class="form-control my-3 btn" style="background-color: hotpink" type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>

</html>
