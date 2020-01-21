@extends('layouts.app')

@section('content')
<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        @include('common.error')
        <div class="float-right">
            <button type="button" id="add-btn" class="btn btn-small btn-outline-primary" data-toggle="modal"
                data-target="#addUtang">ADD</button><br>
        </div>
        <div class="modal fade" id="addUtang" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="form-title text-center">Add Utang</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form method="POST" class="register-form" id="register-form" action="{{ url('addUtang')}}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <label for="first_name">First name</label> -->
                                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <!-- <label for="middle_name">Middle name</i></label> -->
                                <input class="form-control" type="text" name="middle_name" id="middle_name" placeholder="Middle Name" />
                            </div>
                            <div class="form-group">
                                <!-- <label for="last_name">Last name</label> -->
                                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <!-- <label for="item">Item</label> -->
                                <input class="form-control" id="item" type="text" name="item" placeholder="Item ...">
                            </div>
                            <div class="form-group">
                                <!-- <label for="quantity">Quantity</label> -->
                                <input class="form-control" type="number" name="quantity" id="quantity" placeholder="Quantity ....." />
                            </div>
                            <div class="form-group">
                                <!-- <label for="price">Price</label> -->
                                <input class="form-control" type="number" name="price" id="price" placeholder="Price ....." />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="add_palautang" id="signup" class="form-submit btn-success" value="Add" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="table-responsive" style="margin-bottom: '20px'">
            <table class="table table-bordered">
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
                        <td>{{$n->first_name}} {{$n->middle_name}} {{$n->last_name}}</td>
                        <td>{{$n->item}}</td>
                        <td>{{$n->quantity}}</td>
                        <td>{{$n->price}}</td>
                        <td>{{$n->amount}}</td>
                        <form action="{{ url('utang/'.$n->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <td><button><i class="fas fa-trash" style='font-size:24px;color:red'></i></button></td>
                        </form>
                        <td>
                            <button type="submit button" class="btn"><i class='far fa-edit' style='font-size:24px'></i></button>
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

    <div id="menu1" class="container tab-pane fade table-responsive">
        @include('common.error')
        <div class="float-right">
            <button type="button" id="add-btn" class="btn btn-small btn-outline-primary" data-toggle="modal"
                data-target="#addItem">ADD</button><br>
        </div>
        <div class="modal fade" id="addItem" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form method="POST" class="register-form" id="register-form" action="{{ url('addInventory') }}">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="form-title text-center">Add Item</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="text" name="item" id="name" placeholder="Item Name"/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="number" name="quantity" id="name" placeholder="Quantity"/>
                            </div>
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input class="form-control" type="number" name="price" id="name" placeholder="Price"/>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="add_item" id="signup" class="form-submit btn-success" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered ">
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
                    <form action="{{ url('item/'.$i->id)}}" method='POST'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <td><button><i class='fas fa-trash' style='font-size:24px;color:red'></i></button></td>
                    </form>

                    <td><button><i class='far fa-edit' style='font-size:24px'></i></button></td>
                </tr>
                @endforeach
            </tbody>

            @endif
        </table>
        <button class="btn btn-outline-secondary"><a href="addItem">Add Item</a></button>
    </div>
</div><br>
@endsection()
