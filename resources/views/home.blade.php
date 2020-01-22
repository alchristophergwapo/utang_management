@extends('layouts.app')

@section('content')
<!-- Tab panes -->
<div>
    <div id="home" class="container"><br>

        <div class="modal fade" id="addUtang" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="text-center">Add Utang</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form method="POST" class="register-form" id="register-form" action="{{ route('addUtang')}}"
                        autocomplete="off">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <label for="first_name">First name</label> -->
                                <input class="form-control" type="text" name="first_name" id="first_name"
                                    placeholder="First Name" value="{{old('first_name')}}" />
                                @if ($errors->has('first_name'))
                                <p class="alert text-danger">
                                    {{$errors->first('first_name')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="middle_name">Middle name</i></label> -->
                                <input class="form-control" type="text" name="middle_name" id="middle_name"
                                    placeholder="Middle Name" value="{{old('middle_name')}}" />
                                @if ($errors->has('middle_name'))
                                <p class="alert text-danger">
                                    {{$errors->first('middle_name')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="last_name">Last name</label> -->
                                <input class="form-control" type="text" name="last_name" id="last_name"
                                    placeholder="Last Name" value="{{old('last_name')}}" />
                                @if ($errors->has('last_name'))
                                <p class="alert text-danger">
                                    {{$errors->first('last_name')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="item">Item</label> -->
                                <input class="form-control" id="item" type="text" name="item" placeholder="Item ..."
                                    value="{{old('item')}}">
                                @if ($errors->has('item'))
                                <p class="alert text-danger">
                                    {{$errors->first('item')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="quantity">Quantity</label> -->
                                <input class="form-control" type="number" name="quantity" id="quantity"
                                    placeholder="Quantity ....." value="{{old('quantity')}}" />
                                @if ($errors->has('quantity'))
                                <p class="alert text-danger">
                                    {{$errors->first('quantity')}}
                                </p>
                                @endif
                            </div>
                            <!-- <div class="form-group">
                                <input class="form-control" type="number" name="price" id="price"
                                    placeholder="Price ....." value="{{old('price')}}" />
                                @if ($errors->has('price'))
                                <p class="alert text-danger">
                                    {{$errors->first('price')}}
                                </p>
                                @endif
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="signup" class="btn btn-success btn-small"
                                name="add_palautang">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="table-responsive" style="margin-bottom: '20px'">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>
                            <h3>Listahan sa mga Nangutang</h3>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="button" id="add-btn" class="btn btn-small btn-outline-primary"
                                data-toggle="modal" data-target="#addUtang">ADD</button><br>
                        </td>
                    </tr>
                </thead>
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                @if (count($nangutang) > 0)
                <tbody>
                    @foreach ($nangutang as $n)
                    <tr>
                        <td name="id" hidden>{{$n->id}}</td>
                        <td name="first_name">{{$n->first_name}} {{$n->middle_name}} {{$n->last_name}}</td>
                        <td>{{$n->item}}</td>
                        <td>{{$n->quantity}}</td>
                        <td>{{$n->price}}</td>
                        <td>{{$n->amount}}</td>
                        <form action="{{ url('deleteUtang',$n->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <td class="text-center">
                                <button><i class="fas fa-trash" style='font-size:24px;color:red'></i></button>
                            </td>
                        </form>
                        <td class="text-center">

                            <form action="{{ route('editUtang',$n->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn" name="edit">
                                    <a><i class='far fa-edit' style='font-size:24px'></a></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
        <!-- <button class="btn btn-outline-secondary"><a href="addNangutang">Add Nangutang</a></button> -->
    </div>
    <br>
    <hr>
    <div id="menu1" class="container table-responsive">
        <div class="modal fade" id="addItem" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form method="POST" class="register-form" id="register-form" action="{{ url('addInventory') }}"
                    autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-center">Add Item</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="text" name="item" id="item" placeholder="Item Name"
                                    value="{{old('item')}}" />
                                @if ($errors->has('item'))
                                <p class="alert text-danger">
                                    {{$errors->first('item')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="number" name="quantity" id="name"
                                    placeholder="Quantity" value="{{old('quantity')}}" />
                                @if ($errors->has('quantity'))
                                <p class="alert text-danger">
                                    {{$errors->first('quantity')}}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="number" name="price" id="name" placeholder="Price"
                                    value="{{old('price')}}" />
                                @if ($errors->has('price'))
                                <p class="alert text-danger">
                                    {{$errors->first('price')}}
                                </p>
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="add_item" id="signup" class="btn btn-success">Add</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <td class="text-center">
                    <h3>Listahan sa mga Tinda</h3>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="button" id="add-btn" class="btn btn-small btn-outline-primary float-right" data-toggle="modal"
                        data-target="#addUtang">ADD</button><br>
                </td>
            </tr>
        </thead>
        <thead class="thead-dark">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Available Quantity</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        @if (count($items) > 0)
        <tbody>
            @foreach ($items as $i)
            <tr>
                <td>{{$i->item}}</td>
                <td>{{$i->price}}</td>
                <td>{{$i->quantity}}</td>
                <td class="text-center">
                    <form action="{{ route('deleteItem',$i->id)}}" method='POST'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button><i class='fas fa-trash' style='font-size:24px;color:red'></i></button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('editItem',$i->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn" name="edit">
                            <a><i class='far fa-edit' style='font-size:24px'></a></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

        @endif
    </table>
    <!-- <button class="btn btn-outline-secondary"><a href="addItem">Add Item</a></button> -->
</div>
</div><br>
@endsection()