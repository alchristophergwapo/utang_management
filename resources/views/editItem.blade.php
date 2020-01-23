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
    <style>
    .container {
        padding: 30px;
    }
    img {
        width: 100%;
        height: 100%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-header text-center bg-primary">
            <h2 class="form-title">Update Item</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form class="register-form" id="register-form" action="{{ route('editItem',$item->id)}}" method="POST"
                    autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @if (count($item) > 0)
                        <div>
                            <input name="id" type="text" value="{{ $item->id}}" hidden />
                        </div>
                        <div class="form-group">
                            <label for="item">Item :</label>
                            <input class="form-control" type="text" name="item" id="item"
                                value="{{old('item',$item['item'])}}" />
                            @if ($errors->has('item'))
                            <p class="alert text-danger">
                                {{$errors->first('item')}}
                            </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pass">Quantity :</label>
                            <input class="form-control" type="number" name="quantity" id="quantity"
                                value="{{old('quantity',$item['quantity'])}}" />
                            @if ($errors->has('quantity'))
                            <p class="alert text-danger">
                                {{$errors->first('quantity')}}
                            </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="re-pass">Price :</label>
                            <input class="form-control" type="number" name="price" id="price"
                                value="{{old('price',$item['price'])}}" />
                            @if ($errors->has('price'))
                            <p class="alert text-danger">
                                {{$errors->first('price')}}
                            </p>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="float-right">
                        <form action="{{ route('home') }}">
                            <button type="submit" class="btn btn-danger" position="relative">Cancel</button>
                        </form>
                        <button type="submit" name="update" id="signup"
                            class="form-submit btn btn-success">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <img src="/images/kwikemart.jpeg" alt="">
            </div>
        </div>

    </div>
</body>

</html>