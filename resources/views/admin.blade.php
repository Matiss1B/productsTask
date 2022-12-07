@extends("main")
@section("content")
<div class="padL2rem flex listBox header w-max bgs1 space-between">
    <div class="flex alignCenter gap1">
        <h1>Admin</h1>
        <img class = "logo" src="../resources/imgs/box.png" alt="djjdj">
    </div>
    <div class="flex alignCenter gap1 padR5rem">
        <a href="http://localhost:8888/products/public/admin">Add</a>
        <a href="http://localhost:8888/products/public/adminList">List</a>
    </div>
</div>
<div class="flex col alignCenter gap1 marB2rem">
    <h1 class = "marT10rem">Insert</h1>
    <div class="insertBox flex col bgs1 alignCenter gap1 padL2rem padR2rem padB10px marB100px w-500px">
        <h1>Product</h1>
        <form action="insert" method="post" class="flex gap1 col alignCenter" enctype = "multipart/form-data">
            {{ csrf_field() }}
            <div>
                <div class="flex gap2" id ="form-input">
                    <div class="flex col">
                        <label for="Name">Name:</label>
                        <input type="text" name ="name"class="@error('name') please at least 3 @enderror">
                    </div>
                    <div class="flex col">
                            <label for="Name">Category:</label>
                            <select id="" name ="category">
                            @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
                <div class="flex col">
                        <label for="Name">Description:</label>
                        <textarea type="text" name ="desc"></textarea>
                </div id="form-admin">
                <div class="flex col">
                    <label for="Name">IMG:</label>
                    <input class = "imgInput" type="file" name ="img">
                </div>
                <div class="flex gap2" id ="form-input-1">
                    <div class="flex col">
                            <label for="Name">Weight:</label>
                            <input type="nummber" name ="weight">
                    </div>
                    <div class="flex col">
                            <label for="Name">Amount:</label>
                            <input type="nummber"name ="amount">
                    </div>
                </div>
                <div class="flex gap2" id ="form-input-2">
                    <div class="flex col">
                            <label for="Name">Color:</label>
                            <input type="nummber"name ="color">
                    </div>
                    <div class="flex col">
                            <label for="Name">Size:</label>
                            <input type="nummber" name ="size">
                    </div>
                </div>
                <div class="flex gap2" id ="form-input-3">
                    <div class="flex col">
                            <label for="Name">Shippping:</label>
                            <input type="nummber" name ="shipping">
                    </div>
                    <div class="flex col">
                            <label for="Name">Price:</label>
                            <input type="nummber" name ="price">
                    </div>
                </div>
            </div>
            <button type="submit" class = "btn">Insert</button>
        </form>
    </div>


</div>
@endsection