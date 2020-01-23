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
<style>
h2 {
    margin-bottom: 0;
}

img {
    height: 100%;
    width: 100%;
}

.container {
    padding: 30px;
}

.input-group {
    margin-top: 20px;
}
</style>

<body>
    <div class="container">
        <div class="card-header bg-info">
            <h2 class="form-title text-center">Update Utang</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form class="register-form" id="register-form" action="{{ route('editUtang',$persons->id)}}"
                    method="POST" autocomplete="off">
                    @csrf
                    @if (count($persons) > 0)
                    <div>
                        <input name="id" type="text" value="{{ $persons['id'] }}" hidden />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">First name&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input class="form-control" type="text" name="first_name" id="first_name"
                            value="{{old('first_name',$persons['first_name'])}}" />
                        @if ($errors->has('first_name'))
                        <p class="alert text-danger">
                            {{$errors->first('first_name')}}
                        </p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Middle name</span>
                        </div>
                        <input class="form-control" type="text" name="middle_name" id="middle_name"
                            value="{{old('middle_name',$persons['middle_name'])}}" />
                        @if ($errors->has('middle_name'))
                        <p class="alert text-danger">
                            {{$errors->first('middle_name')}}
                        </p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Last name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input class="form-control" type="text" name="last_name" id="last_name"
                            value="{{old('last_name',$persons['last_name'])}}" />
                        @if ($errors->has('last_name'))
                        <p class="alert text-danger">
                            {{$errors->first('last_name')}}
                        </p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span
                                class="input-group-text">Item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <select name="item" id="item" class="form-control">
                            @foreach ($items as $i)
                            <option name="item">{{ $i->item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('item'))
                        <p class="alert text-danger">
                            {{$errors->first('item')}}
                        </p>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <input class="form-control" type="number" name="quantity" id="quantity"
                            value="{{old('quantity',$persons['quantity'])}}" />
                        @if ($errors->has('quantity'))
                        <p class="alert text-danger">
                            {{$errors->first('quantity')}}
                        </p>
                        @endif
                    </div>
                    @endif
                    <div class="btn float-right">
                        <form action="{{ route('home') }}">
                            <button type="submit" class="btn btn-danger" position="relative">Cancel</button>
                        </form>
                        <button type="submit" name="update" id="signup" class="form-submit btn btn-success"
                            style="margin-left:30px">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <!-- <img src="/images/update.jpg" alt=""> -->
                <img src="/images/kwikemart.jpeg" alt="">
            </div>
        </div>
    </div>
</body>

</html>