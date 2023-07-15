<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-boot />
    <title>Orders</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-3">
            <x-admin_sidebar />
        </div>
        <div class="col-lg-9">
            <h3 class="display-5 text-center">
                Orders
            </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>User email</th>
                        <th>Rejected</th>
                        <th>Dispatched</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <form action="/update-status/{{ $item->id }}" method="POST">
                            @csrf
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td><img width="100px" src="{{ asset('storage/' . $item->image) }}" alt="">
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->user->email }}</td>
                                <td>
                                    <button name="status" value="Rejected" class="btn btn-danger">
                                        Reject
                                    </button>
                                </td>
                                <td>
                                    <button name="status" value="Approved" type="submit" class="btn btn-success">
                                        Success
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    </div>
</body>

</html>
