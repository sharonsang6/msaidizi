$(document).ready(function () {



    $("#create-item").click(function () {

        window.location.href="http://localhost/Sheila/add_item.html";

    });

    fetch_users();

    function fetch_users(){

        var url = 'http://localhost/Sheila/api/fetch_items.php';

        $.get(url, function (response, status) {

            $parse=JSON.parse(response);
            $("#total_items").text($parse.length);

            $.each($parse,function (key,value) {

                var button='<button class="btn btn btn-outline-success">Edit</button>&nbsp;';
                $admin_body= $("#users_table");
                var table_row=$("<tr>")
                    .append($("<td>").append(value.item_id))
                    .append($("<td>").append(value.item_name))
                    .append($("<td>").append(value.item_type))
                    .append($("<td>").append(value.item_price))
                    .append($("<td>").append(value.amount_in_stock))
                    .append($("<td>").append(value.item_description))
                    .append($("<td>").append(button));
                table_row.click(function () {
                    sessionStorage.setItem("itemname",value.item_name);
                    sessionStorage.setItem("itemtype",value.item_type);
                    sessionStorage.setItem("itemprice",value.item_price);
                    sessionStorage.setItem("itemstock",value.amount_in_stock);
                    sessionStorage.setItem("item_description",value.item_description);
                    sessionStorage.setItem("itemid",value.item_id);



                    window.location.href="http://localhost/Sheila/edit_item.html";


                });
                $admin_body.append(table_row);



            });


        });


    }


});