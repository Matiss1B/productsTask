<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="path/to/jQuery-sidebar.min.js"></script>
    <link rel="stylesheet" href="../../resources/css/style.css">
    <title>ProtuctX</title>
</head>
<body>
    <div class="flex space-between col mainDiv">
    <div class="padL2rem flex listBox header w-max bgs1">
    <div class="flex alignCenter gap1">
        <h1>Admin</h1>
        <img class = "logo" src="../../resources/imgs/box.png" alt="djjdj">
    </div>
</div>
<div class="flex col alignCenter gap1 marB2rem">
    <h1 class = "marT10rem">Edit</h1>
    <div class="insertBox flex col bgs1 alignCenter gap1 padL2rem padR2rem padB10px marB100px w-500px">
        <h1>Product</h1>
        @foreach($products as $product)
        <form action="http://localhost:8888/products/public/editProduct/{{$product->id}}" method="post" class="flex gap1 col alignCenter">
            {{ csrf_field() }}
            <div>
                <div class="flex gap2" id ="form-input">
                    <div class="flex col">
                        <label for="Name">Name:</label>
                        <input type="text" name ="name" value="{{$product->name}}"></input>
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
                        <textarea type="text" name ="desc" value="{{$product->description}}">{{$product->description}}</textarea>
                </div id="form-admin">
                <!-- <div class="flex col">
                    <label for="Name">IMG:</label>
                    <input class = "imgInput" type="file" name ="img" value ="{{$product->img}}"></input>
                </div> -->
                <div class="flex gap2" id ="form-input-1">
                    <div class="flex col">
                            <label for="Name">Weight:</label>
                            <input type="nummber" name ="weight" value ="{{$product->weight}}"></input>
                    </div>
                    <div class="flex col">
                            <label for="Name">Amount:</label>
                            <input type="nummber"name ="amount" value ="{{$product->amount}}"></input>
                    </div>
                </div>
                <div class="flex gap2" id ="form-input-2">
                    <div class="flex col">
                            <label for="Name">Color:</label>
                            <input type="nummber"name ="color" value ="{{$product->color}}"></input>
                    </div>
                    <div class="flex col">
                            <label for="Name">Size:</label>
                            <input type="nummber" name ="size" value ="{{$product->size}}"></input>
                    </div>
                </div>
                <div class="flex gap2" id ="form-input-3">
                    <div class="flex col">
                            <label for="Name">Shippping:</label>
                            <input type="nummber" name ="shipping" value="{{$product->shipping}}"></input>
                    </div>
                    <div class="flex col">
                            <label for="Name">Price:</label>
                            <input type="nummber" name ="price" value="{{$product->price}}"></input>
                    </div>
                </div>
            </div>
            <button type="submit" class = "btn">Update</button>
        </form>
        @endforeach
    </div>
</div>
    </div>
    <script src ="../resources/js/script.js"></script>
</body>
</html>