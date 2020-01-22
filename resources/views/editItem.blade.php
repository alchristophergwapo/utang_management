<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Form</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card card-small" style="margin-top: 50px; margin-bottom: 50px">
            <form class="register-form" id="register-form" action="{{ route('editItem',$item->id)}}" method="POST"
                autocomplete="off">
                @csrf
                <div class="card-header text-center">
                    <h2 class="form-title">Update Item</h2>
                </div>
                <div class="card-body">
                    @if (count($item) > 0)
                    <div>
                        <input name="id" type="text" value="{{ $item->id}}" hidden />
                    </div>
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input class="form-control" type="text" name="item" id="item"
                            value="{{old('item',$item['item'])}}" />
                    </div>
                    <div class="form-group">
                        <label for="pass">Quantity</label>
                        <input class="form-control" type="number" name="quantity" id="quantity"
                            value="{{old('quantity',$item['quantity'])}}" />
                    </div>
                    <div class="form-group">
                        <label for="re-pass">Price</label>
                        <input class="form-control" type="number" name="price" id="price"
                            value="{{old('price',$item['price'])}}" />
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <form action="{{ route('home') }}">
                        <button type="submit" class="btn btn-danger float-right" position="relative">Cancel</button>
                    </form>
                    <button type="submit" name="update" id="signup"
                        class="form-submit btn btn-success float-right">Update</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>