<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
$id = $_POST['id'];
$product = DB::table('products')->select('wh_amount')->where('id', $id)->first();
var_dump($product);
?>




<div class="flex single-product space-between pad10px bgs2" id="popUp">
        <i class=" x fa fa-times" aria-hidden="true" onclick = "popUpHide()"></i>
        <div class="boxes flex">
            <div class="flex col h-100 pad10px w-50 popText">
                <h1></h1>
                <label for="">Description:</label>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis doloremque aliquam odio ratione ipsa. Accusantium ut illo accusamus dignissimos quos omnis. Culpa laborum tempore tempora, provident eaque cum. Nemo, ullam.</p>
                <div class="flex alignCenter gap10px space-evenly">
                    <label for="">Price:</label>
                    <p>199$</p>
                    <label for="">Size:</label>
                    <p>30</p>
                    <label for="">Color:</label>
                    <p>Green</p>
                </div>
                <div class="flex alignCenter gap10px space-evenly">
                    <label for="">Price:</label>
                    <p>199$</p>
                    <label for="">Price:</label>
                    <p>199$</p>
                    <label for="">Price:</label>
                    <p>199$</p>
                </div>
                <div class="flex alignCenter gap10px space-evenly">
                    <label for="">Price:</label>
                    <p>199$</p>
                    <label for="">Price:</label>
                    <p>199$</p>
                    <label for="">Price:</label>
                    <p>199$</p>
                </div>
            </div>
            <div class = "popImg flex col alignCenter justifyCenter gap2">
                <img src="../resources/imgs/monitor.webp" alt="">
                <button class="btn">
                    GET
                </button>
            </div>
        </div>
    </div>