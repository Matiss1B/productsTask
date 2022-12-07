function pop(id) {
    $("#popUp-" + id).removeClass("none");
    $(".overlay").removeClass("none");
}
function popUpHide(id) {
    $("#popUp-" + id).addClass("none");
    $(".overlay").addClass("none");
}
$("#register").click(function () {
    $(".loginBox").slideToggle(400);
    $(".registerBox").slideToggle(400);
    $(".login-logo").css("background-color", "white");
    $(".login-h1").css("color", "rgb(3, 196, 106)");
});
$("#login").click(function () {
    $(".loginBox").slideToggle(400);
    $(".registerBox").slideToggle(400);
    $(".login-logo").css("background-color", "rgb(3, 196, 106)");
    $(".login-h1").css("color", "rgba(46, 46, 46, 0.8)");
});
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    $("#sidebar").removeClass("none");
}

function closeNav() {
    $("#sidebar").addClass("none");
    $(".btn-box").addClass("none");
    document.getElementById("mySidebar").style.width = "0";
}
$(window).resize(function () {
    if ($(window).width() < 1000) {
        $("#product-list-title").removeClass("flex");
        $("#product-list-title").addClass("none");
        $(".boxes").addClass("col").addClass("alignCenter");
    }
    if ($(window).width() > 1000) {
        $("#product-list-title").addClass("flex");
        $("#product-list-title").removeClass("none");
    }

    if ($(window).width() < 700) {
        $("#logo").addClass("none");
        $("#logo").removeClass("flex");
        $("#form-admin")
            .addClass("flex")
            .addClass("col")
            .addClass("alignCenter");
        $("#form-input")
            .addClass("col")
            .addClass("alignCenter")
            .removeClass("gap2");
        $("#form-input-1")
            .addClass("col")
            .addClass("alignCenter")
            .removeClass("gap2");
        $("#form-input-2")
            .addClass("col")
            .addClass("alignCenter")
            .removeClass("gap2");
        $("#form-input-3")
            .addClass("col")
            .addClass("alignCenter")
            .removeClass("gap2");
    }
    if ($(window).width() > 700) {
        $("#logo").removeClass("none");
        $("#logo").addClass("flex");
        $("#form-admin")
            .removeClass("flex")
            .removeClass("col")
            .removeClass("alignCenter");
        $("#form-input").removeClass("col").removeClass("alignCenter");
        $("#form-input-1").removeClass("col").removeClass("alignCenter");
        $("#form-input-2").removeClass("col").removeClass("alignCenter");
        $("#form-input-3").removeClass("col").removeClass("alignCenter");
    }
    if ($(window).width() < 500) {
        $("#footer-content").removeClass("padL10rem");
        $("#footer-content").addClass("padL5rem");
    }
    if ($(window).width() > 500) {
        $("#footer-content").addClass("padL10rem");
        $("#footer-content").removeClass("padL5rem");
    }
});
function openNav() {
    if ($(window).width() < 600) {
        document.getElementById("mySidebar").style.width = "80%";
    } else {
        document.getElementById("mySidebar").style.width = "250px";
    }
    $("#sidebar").removeClass("none");
    $(".overlay").removeClass("none");
    $(".btn-box").removeClass("none");
}
2;
function closeNav() {
    $(".overlay").addClass("none");
    $(".btn-box").addClass("none");
    $("#sidebar").addClass("none");
    document.getElementById("mySidebar").style.width = "0";
}
//Ajax
function filter() {
    var sortBy = $("#dropdown option:selected").attr("name");
    var sortCol = $("#dropdown").val();
    $("#sidebar").addClass("none");
    $(".btn-box").addClass("none");
    $(".overlay").addClass("none");
    document.getElementById("mySidebar").style.width = "0";
    var categoryarray = [];
    var array = [];
    $("#filter4")
        .children(".parent")
        .children(".flex")
        .children(".checkbox")
        .each(function () {
            if ($(this).is(":checked")) {
                if (
                    categoryarray.includes(
                        $(this).parent().parent().attr("value")
                    ) !== true
                ) {
                    categoryarray.push($(this).parent().parent().attr("value"));
                }
                var criteryArr = [
                    $(this).attr("name"),
                    "=",
                    $(this).val(),
                    ";",
                ];
                array.push($(this).val());
            }
        });
    if ($("#from").val() !== "") {
        var from = $("#from").val();
    } else {
        var from = "0";
    }
    if ($("#to").val() !== "") {
        var to = $("#to").val();
    } else {
        var to = "100000";
    }
    console.log(from, to);
    if (array.length > 0) {
        var url =
            "filter/" +
            array +
            "/" +
            categoryarray +
            "/" +
            sortBy +
            "/" +
            sortCol +
            "/" +
            from +
            "/" +
            to;
    } else {
        var url = "sort/" + sortBy + "/" + sortCol;
    }
    console.log(array, categoryarray);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        //data: { array: array },
        type: "POST",
        success: function (results) {
            console.log(results);
            // console.log("filter/" + array);
            var productField;
            var popUp;
            var div;
            $(".filter").html("");
            div =
                "<div class='overlay none'></div>" +
                "<div class='list1 flex gap1 wrap'></div>" +
                "<div class='scriptPopUp'></div>";
            $(".filter").append(div);
            results.forEach((element) => {
                console.warn(element);
                productField =
                    "<div class='flex col single-product padT2rem alignCenter' id = 'list' onclick='pop(" +
                    element["id"] +
                    ")'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "''>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<div class='test'></div>" +
                    "</div>";
                popUp =
                    "<div class='flex space-between pad10px bgs2 none popUp' id='popUp-" +
                    element["id"] +
                    "'>" +
                    "<i class=' x fa fa-times' aria-hidden='true' onclick = 'popUpHide(" +
                    element["id"] +
                    ")'></i>" +
                    "<div class='boxes flex'>" +
                    "<div class='flex col h-100 pad10px w-50 popText'>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<label for=''>Description:</label>" +
                    "<p>" +
                    element["description"] +
                    "</p>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Price:</label>" +
                    "<p>" +
                    element["price"] +
                    "</p>" +
                    "<label for=''>Size:</label>" +
                    "<p>" +
                    element["size"] +
                    "</p>" +
                    "<label for=''>Color:</label>" +
                    "<p>" +
                    element["color"] +
                    "</p>" +
                    "</div>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Weight:</label>" +
                    "<p>" +
                    element["weight"] +
                    "</p>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class = 'popImg flex col alignCenter justifyCenter gap2'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "' alt=''>" +
                    "<button class='btn'>GET</button>" +
                    "</div>" +
                    "</div>";
                $(".list1").append(productField);
                $(".scriptPopUp").append(popUp);
            });
        },
    });
}
function clear1() {
    $("#sidebar").addClass("none");
    $(".btn-box").addClass("none");
    $(".overlay").addClass("none");
    document.getElementById("mySidebar").style.width = "0";
    $("#filter4")
        .children(".parent")
        .children(".flex")
        .children(".checkbox")
        .each(function () {
            $(this).prop("checked", false);
        });
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "clear",
        type: "POST",
        success: function (results) {
            console.log(results);
            var productField;
            var popUp;
            var div;
            $(".filter").html("");
            div =
                "<div class='overlay none'></div>" +
                "<div class='list1 flex gap1 wrap'></div>" +
                "<div class='scriptPopUp'></div>";
            $(".filter").append(div);
            results.forEach((element) => {
                console.warn(element);
                productField =
                    "<div class='flex col single-product padT2rem alignCenter' id = 'list' onclick='pop(" +
                    element["id"] +
                    ")'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "''>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<div class='test'></div>" +
                    "</div>";
                popUp =
                    "<div class='flex space-between pad10px bgs2 none popUp' id='popUp-" +
                    element["id"] +
                    "'>" +
                    "<i class=' x fa fa-times' aria-hidden='true' onclick = 'popUpHide(" +
                    element["id"] +
                    ")'></i>" +
                    "<div class='boxes flex'>" +
                    "<div class='flex col h-100 pad10px w-50 popText'>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<label for=''>Description:</label>" +
                    "<p>" +
                    element["description"] +
                    "</p>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Price:</label>" +
                    "<p>" +
                    element["price"] +
                    "</p>" +
                    "<label for=''>Size:</label>" +
                    "<p>" +
                    element["size"] +
                    "</p>" +
                    "<label for=''>Color:</label>" +
                    "<p>" +
                    element["color"] +
                    "</p>" +
                    "</div>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Weight:</label>" +
                    "<p>" +
                    element["weight"] +
                    "</p>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class = 'popImg flex col alignCenter justifyCenter gap2'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "' alt=''>" +
                    "<button class='btn'>GET</button>" +
                    "</div>" +
                    "</div>";
                $(".list1").append(productField);
                $(".scriptPopUp").append(popUp);
            });
        },
    });
}
function search() {
    var search = $("#search").val();
    if ($("#search").val() == "") {
        var url = "clear";
    } else {
        var url = "search/" + search;
    }
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        type: "POST",
        success: function (results) {
            console.log(results);
            var productField;
            var popUp;
            var div;
            $(".filter").html("");
            div =
                "<div class='overlay none'></div>" +
                "<div class='list1 flex gap1 wrap'></div>" +
                "<div class='scriptPopUp'></div>";
            $(".filter").append(div);
            results.forEach((element) => {
                console.warn(element);
                productField =
                    "<div class='flex col single-product padT2rem alignCenter' id = 'list' onclick='pop(" +
                    element["id"] +
                    ")'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "''>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<div class='test'></div>" +
                    "</div>";
                popUp =
                    "<div class='flex space-between pad10px bgs2 none popUp' id='popUp-" +
                    element["id"] +
                    "'>" +
                    "<i class=' x fa fa-times' aria-hidden='true' onclick = 'popUpHide(" +
                    element["id"] +
                    ")'></i>" +
                    "<div class='boxes flex'>" +
                    "<div class='flex col h-100 pad10px w-50 popText'>" +
                    "<h1>" +
                    element["name"] +
                    "</h1>" +
                    "<label for=''>Description:</label>" +
                    "<p>" +
                    element["description"] +
                    "</p>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Price:</label>" +
                    "<p>" +
                    element["price"] +
                    "</p>" +
                    "<label for=''>Size:</label>" +
                    "<p>" +
                    element["size"] +
                    "</p>" +
                    "<label for=''>Color:</label>" +
                    "<p>" +
                    element["color"] +
                    "</p>" +
                    "</div>" +
                    "<div class='flex alignCenter gap10px space-evenly'>" +
                    "<label for=''>Weight:</label>" +
                    "<p>" +
                    element["weight"] +
                    "</p>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class = 'popImg flex col alignCenter justifyCenter gap2'>" +
                    "<img src='../storage/app/" +
                    element["img"] +
                    "' alt=''>" +
                    "<button class='btn'>GET</button>" +
                    "</div>" +
                    "</div>";
                $(".list1").append(productField);
                $(".scriptPopUp").append(popUp);
            });
        },
    });
}
function adminFilter() {
    var array = [];
    if ($("#category").val() !== "") {
        array.push($("#category").val());
    }
    if ($("#date").val() !== "") {
        array.push($("#date").val());
    } else {
        array.push("+");
    }
    if ($("#amount").val() !== "") {
        var amount = $("#amount").val();
    } else {
        var amount = 0;
    }
    console.log(array);
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "adminFilter/" + array + "/" + amount,
        type: "POST",
        success: function (results) {
            console.log(results);
            var tableHead =
                "<tr>" +
                "<th>Name</th>" +
                "<th>Description</th>" +
                "<th><i class='fa fa-camera-retro' aria-hidden='true'></i></th>" +
                "<th>Added</th>" +
                "<th>Weight</th>" +
                "<th>Amount</th>" +
                "<th>Avaliable</th>" +
                "<th>Amount(WH)</th>" +
                "<th>Color</th>" +
                "<th>Size</th>" +
                "<th>Shippping</th>" +
                "<th>Category</>" +
                "<th><i class='fa fa-eur' aria-hidden='true'></i></th>" +
                "<th>Edit</th>" +
                "<th>Delete</th>";
            ("</tr>");
            $(".table").html("");
            $(".table").append(tableHead);
            var product;
            results.forEach((element) => {
                console.warn(element);
                product =
                    "<tr>" +
                    "<td>" +
                    element["name"] +
                    "</td>" +
                    "<td>" +
                    element["description"] +
                    "</td>" +
                    "<td><img src='../storage/app/" +
                    element["img"] +
                    "'></img></td>" +
                    "<td>" +
                    element["timestamp"] +
                    "</td>" +
                    "<td>" +
                    element["weight"] +
                    "</td>" +
                    "<td>" +
                    element["amount"] +
                    "</td>" +
                    "<td>" +
                    element["is_avaliable"] +
                    "</td>" +
                    "<td>" +
                    element["wh_amount"] +
                    "</td>" +
                    "<td>" +
                    element["color"] +
                    "</td>" +
                    "<td>" +
                    element["size"] +
                    "</td>" +
                    "<td>" +
                    element["shipping"] +
                    "</td>" +
                    "<td>" +
                    element["category_id"] +
                    "</td>" +
                    "<td>" +
                    element["price"] +
                    "</td>" +
                    "<td><a class ='edit' href='http://localhost:8888/products/public/edit/" +
                    element["id"] +
                    "'><i class='fa fa-pencil-square' aria-hidden='true' ></i></a></td>" +
                    "<td><a class ='delete' href='http://localhost:8888/products/public/delete/" +
                    element["id"] +
                    "'><i class='fa fa-trash' aria-hidden='true'></i></a></td>" +
                    "</tr>";
                $(".table").append(product);
            });
        },
    });
}
{
    /* <tr>
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
        </tr> */
}
