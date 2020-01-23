@extends('layouts.app')

@section('content')
<!-- Tab panes -->
<div>
    <div id="home"><br>

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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">First name &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input class="form-control" type="text" name="first_name" id="first_name"
                                    value="{{old('first_name')}}" />
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
                                    placeholder="Middle Name" value="{{old('middle_name')}}" />
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
                                    placeholder="Last Name" value="{{old('last_name')}}" />
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
                                    <span
                                        class="input-group-text">Quantity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input class="form-control" type="number" name="quantity" id="quantity"
                                    placeholder="Quantity ....." value="{{old('quantity')}}" />
                                @if ($errors->has('quantity'))
                                <p class="alert text-danger">
                                    {{$errors->first('quantity')}}
                                </p>
                                @endif
                            </div>
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
        <div class="table-responsive container" style="margin-bottom: '20px'">

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
                                <button><i class="fas fa-trash" style='font-size:23px;color:red'></i></button>
                            </td>
                        </form>
                        <td class="text-center">

                            <form action="{{ route('editUtang',$n->id) }}" method="GET">
                                {{ csrf_field() }}
                                <button type="submit" class="btn" name="edit">
                                    <a><i class='far fa-edit' style='font-size:23px'></a></i>
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input class="form-control" type="text" name="item" id="item" placeholder="Item Name"
                                    value="{{old('item')}}" />
                                @if ($errors->has('item'))
                                <p class="alert text-danger">
                                    {{$errors->first('item')}}
                                </p>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Quantity&nbsp;</span>
                                </div>
                                <input class="form-control" type="number" name="quantity" id="name"
                                    value="{{old('quantity')}}" />
                                @if ($errors->has('quantity'))
                                <p class="alert text-danger">
                                    {{$errors->first('quantity')}}
                                </p>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span
                                        class="input-group-text">Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <input class="form-control" type="number" name="price" id="name"
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
    <table class="table table-striped table-sm" data-pagination="true" data-page-size="5" 
        data-page-list="[5, 10, 25, 50, 100, ALL]" id="items"
        data-id-field="name"
    >
        <thead>
            <tr>
                <td class="text-center">
                    <h3>Listahan sa mga Tinda</h3>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button type="button" id="add-btn" class="btn btn-small btn-outline-primary float-right"
                        data-toggle="modal" data-target="#addItem">ADD</button><br>
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
                        <button><i class='fas fa-trash' style='font-size:23px;color:red'></i></button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('editItem',$i->id) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn" name="edit">
                            <a><i class='far fa-edit' style='font-size:23px'></a></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

        @endif
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$items->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
</div>
<br>
@endsection()