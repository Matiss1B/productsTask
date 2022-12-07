@extends('main')
@section('content')
<div class="padL2rem flex listBox header space-between w-max bgs1">
    <div class="flex alignCenter gap1">
            <h1>ProductX</h1>
            <img class = "logo" src="../resources/imgs/box.png" alt="djjdj">
    </div>
    <div class="flex alignCenter gap1 padR5rem">
        <a href="http://localhost:8888/products/public/admin">Add</a>
        <a href="http://localhost:8888/products/public/adminList">List</a>
    </div>
</div>
<div class=" alignCenter flex col pad2rem">
    <h1 class="marT100px marB50px">List</h1>
<div class="test"></div>
    <div class = "w-max flex gap1 padB10px list-nav" id =  "adminFilter">
        <div>
            <label for="">Category</label>
            <select name="category" id = "category">
            <option value="" selected = "selected">Select Category</option>
            @foreach($categorys as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
            </select>
        </div>
        <div>
            <label for="">Date</label>
            <input type="date" id = "date">
        </div>
        <div>
            <label for="">Amount</label>
            <input type="input" id = "amount">
        </div>
        <button onclick = "adminFilter()">Filter</button>
    </div>
    <div class="scrollbox-x">
        <table class = "table w-max">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th><i class="fa fa-camera-retro" aria-hidden="true"></i></th>
            <th>Added</th>
            <th>Weight</th>
            <th>Amount</th>
            <th>Avaliable</th>
            <th>Amount(WH)</th>
            <th>Color</th>
            <th>Size</th>
            <th>Shippping</th>
            <th>Category</>
            <th><i class="fa fa-eur" aria-hidden="true"></i></th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td><img src="../storage/app/{{$product->img}}" alt=""></img></td>
            <td>{{$product->timestamp}}</td>
            <td>{{$product->weight}}</td>
            <td>{{$product->amount}}</td>
            <td>{{$product->is_avaliable}}</td>
            <td>{{$product->wh_amount}}</td>
            <td>{{$product->color}}</td>
            <td>{{$product->size}}</td>
            <td>{{$product->shipping}}</td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->price}}</td>
            <td><a class ="edit" href="http://localhost:8888/products/public/edit/{{$product->id}}""><i class="fa fa-pencil-square" aria-hidden="true" ></i></a></td>
            <td><a class ="delete" href="http://localhost:8888/products/public/delete/{{$product->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
        @endforeach
        </table>
    </div>
</div>
@endsection