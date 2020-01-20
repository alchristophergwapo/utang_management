@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <div class="table-responsive" style="margin-bottom: '20px'">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>First name</th>
                            <th>Middle name</th>
                            <th>Last name</th>
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
                            <td>{{$n->first_name}}</td>
                            <td>{{$n->middle_name}}</td>
                            <td>{{$n->last_name}}</td>
                            <td>{{$n->item}}</td>
                            <td>{{$n->quantity}}</td>
                            <td>{{$n->price}}</td>
                            <td>{{$n->amount}}</td>
                            <form action="{{ url('utang/'.$n->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <td><button><i class="fas fa-trash" style='font-size:24px;color:red'></i></button></td>
                            </form>
                            <form method="POST" action="{{ url('utangEdit/'.$n->id)}}">
                                <td><button type="submit button" class="btn"><i class='far fa-edit'
                                            style='font-size:24px'></i></button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
                <button class="btn btn-outline-secondary"><a href="addNangutang">Add Nangutang</a></button>
            </div>
        </div>

        <div id="menu1" class="container tab-pane fade table-responsive">
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
    </div>
</div><br>
@endsection()
