@extends('main')
@section('content')
<div class="alignCenter justifyCenter flex w-max h-max" id ="product-list-title">
    <div class="title-div bgs2 alignCenter  flex space-between padL2rem ">
    <div class="box1 pad5rem"><h1>Search, decide, buy</h1></div>
    <div class="flex col box bgs3 alignCenter justifyCenter padL2rem padR2rem">
        <div class="flex gap1 box2 alignCenter">
            <h1>{{session('user_id')}}</h1>
            <img class = "logo" src="../resources/imgs/box.png" alt="djjdj">
        </div>
        <p class = "pad10px pop-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti veniam id quam. Reiciendis vero cumque molestiae totam. Dolores harum corporis autem laborum aut eum magni animi reiciendis? Animi, tempora nesciunt.</p>
    </div>
    </div>
</div>
<div class="flex col w-max justifyCenter alignCenter main1 pad2rem">
    <!-- <div class="overlay none"></div> -->
    <h1>Products</h1>
    <div id="mySidebar" class="sidebar flex col space-between  bgs1">
        <div class="pad10px alignCenter none" id = "sidebar">
            <a class="closeBtn" onclick="closeNav()">×</a>
            <h1 class="w-max textC">Filter</h1>
            <div class="flex col gap1 space-between w-max" id ="filter4">
                <div class="parent" value = "color">
                    <label for="" class="title">Color</label>
                    @foreach($colors as $color)
                    <div class="flex">
                        <input name = "color" type="checkbox" class = "checkbox" id="A-Z" value = "{{$color->color}}">
                        <label for="vehicle1">{{$color->color}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="parent" value = "category_id">
                    <label for="" class="title">Category</label>
                    @foreach($categorys as $category)
                        <div class="flex">
                            <input type="checkbox" class = "checkbox" value = "{{$category->id}}">
                            <label for="vehicle1">{{$category->category}}</label>
                        </div>
                    @endforeach
                </div>
                <div class = "price">
                    <label for="" class="title">Price:</label>
                    <div class="flex gap1">
                    <input type="number" name="from" id="from">
                    <input type="number" name="to" id="to">
                    </div>
                </div>
                <label for="" class="title">Sort by:</label>
                    <select name="category" id="dropdown">
                        <option value="price" name = "price">Hightest price</option>
                        <option value="price" name = "priceL">Lowest price</option>
                        <option value="timestamp" name = "date">Newest</option>
                        <option value="timestamp" name = "dateO">Oldests</option>
                    </select>
            </div>
        </div>
        <div class="flex gap1 justifyCenter marB2rem w-max ">
                    <div class ="btn-box">
                        <button class="btn2" onclick = "filter()">
                            Filter
                        </button> 
                        <button class="btn" onclick = "clear1()">
                            Clear
                        </button> 
                    </div>
        </div>
	</div>
    <div class="flex w-100vw pad2rem gap1 main1 wrap alignCenter justifyCenter">
        <div class = " w-max alignCenter flex space-between list-nav" id = "list">
            <div>
                <i class="fa fa-filter" aria-hidden="true" onclick ="openNav()" id="filter"></i>
            </div>
            <div class ="search flex gap1">
                <div>
                    <i class="fa fa-search" id ="serach-i" aria-hidden="true" onclick = "search()"></i>
                    <input type="text" id = "search">
                </div>
            </div>
        </div>
        <div class="filter flex wrap gap1">
                <div class="overlay none"></div>
            @foreach($products as $product)
                    <div class="flex col single-product padT2rem alignCenter" id = "list" onclick="pop({{$product->id}})">
                        <img src="../storage/app/{{$product->img}}" alt="">
                        <h1>{{$product->name}}</h1>
                        <div class="test"></div>
                    </div>
                <div class="flex space-between pad10px bgs2 none popUp" id="popUp-{{$product->id}}">
                    <i class=" x fa fa-times" aria-hidden="true" onclick = "popUpHide({{$product->id}})"></i>
                    <div class="boxes flex">
                        <div class="flex col h-100 pad10px w-50 popText">
                            <h1>{{$product->name}}</h1>
                            <label for="">Description:</label>
                            <p>{{$product->description}}</p>
                            <div class="flex alignCenter gap10px space-evenly">
                                <label for="">Price:</label>
                                <p>{{$product->price}}</p>
                                <label for="">Size:</label>
                                <p>{{$product->size}}</p>
                                <label for="">Color:</label>
                                <p>{{$product->color}}</p>
                            </div>
                            <div class="flex alignCenter gap10px space-evenly">
                                <label for="">Weight:</label>
                                <p>{{$product->weight}}</p>
                            </div>
                            
                        </div>
                        <div class = "popImg flex col alignCenter justifyCenter gap2">
                            <img src="../storage/app/{{$product->img}}" alt="">
                            <button class="btn">
                                GET
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection