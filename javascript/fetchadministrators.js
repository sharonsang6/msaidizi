// $(document).ready(function () {
//     $(document).on("click", "button.user" , function() {
//         var id = $(this).attr('id');

//         swal({
//             title: "Are you sure?",
//             text: "Confirm to delete administrator",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//         })
//             .then((willDelete) => {
//                 if (willDelete) {

//                     f(id);

//                 } else {

//                 }
//             });


//     });

    $.getJSON("http://localhost/msaidizi/expenses.php",function (response) {

        $.each(response, function() {
            this.vendButton = "<button onclick=\"javascript:callJavascriptFunction()\" type=\"button\" class=\"btn btn-outline-danger btn-sm user\" id='" + this.admin_id + "'>DELETE</button>";

        });



        $table=$('#admin_table').DataTable({
                "processing" : true,
                 data:response,
                "columns" : [ {
                    "data" : "admin_name"
                }, {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, 
                {
                    "data" : "admin_email"
                }, {
                    "data" : "status"
                }, {
                    data: "vendButton"
                }],


            });




    });





    $('#admin_table tbody').on( 'click', 'button.viewdata', function (data) {
        var rowID = $(obj).attr('id');
        alert(rowID);

    } );




    $.get("http://localhost/SCO4OO/api/admin_count.php",function (response) {
        $parse=JSON.parse(response);
        $.each($parse,function (key,value) {


            $("#total_active").text($parse.length);

        })


    });
    $.get("http://localhost/SCO4OO/api/fetch_inactive_administrators.php",function (response) {
        $parse=JSON.parse(response);

        $.each($parse,function (key,value) {
            $("#inactive").text($parse.length);

        });


    });



    function f(user_id) {
        $.ajax({
            url:"http://localhost/SCO4OO/api/suspend_admin.php",
            type: "POST",
            data: 'user_id=' + user_id,
            success: function (response) {
                var validate = $.parseJSON(response);
                swal(validate.message, {
                });
                location.reload(true);

            },
            error: function (response) {
                alert('ajax failed');
                // ajax error callback
            },

        });




    }
    function activate(user_id) {
        $.ajax({
            url:"http://localhost/SCO4OO/api/activate_admin.php",
            type: "POST",
            data: 'user_id=' + user_id,
            success: function (response) {
                var validate = $.parseJSON(response);
                swal(validate.message, {
                });
                location.reload(true);
            },
            error: function (response) {
                alert('ajax failed');
                // ajax error callback
            },

        });




    }


    $.getJSON("http://localhost/SCO4OO/api/fetchadministrators.php",function (data) {
        $.each(data,function (name,value) {

            $("#total_admin").text(data.length);


        });



    });

    function f(admin_id) {
        $.ajax({
            url:"http://localhost/SCO4OO/api/suspend_admin.php",
            type: "POST",
            data: 'admin_id=' + admin_id,
            success: function (response) {
                var validate = $.parseJSON(response);
                swal(validate.message, {
                    icon: "success",
                });
                location.reload(true);

            },
            error: function (response) {
                alert('ajax failed');
                // ajax error callback
            },

        });




    }

});