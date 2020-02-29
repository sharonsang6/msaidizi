$(document).ready(function () {


    // $.get("http://localhost/SCO4OO/api/report_active_users.php",function (data) {
    //     $parse=JSON.parse(data);
    //     var labels=[];

    //     var labeldata=[];

    //     $.each($parse,function (key,value) {

    //         labels.push(value.user_region);

    //         labeldata.push(value.number);

    //     });


    // });



    $.get("http://localhost/msaidizi//bookings_report.php",function (data) {

        $parse=JSON.parse(data);

        var labels=[];

        var labeldata=[];

        $.each($parse,function (key,value) {

           labels.push(value.reg_date);

           labeldata.push(value.number);

        })

        var wb = XLSX.utils.table_to_book(document.getElementById('mytable'), {sheet:"Sheet JS"});
        var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
        function s2ab(s) {
                        var buf = new ArrayBuffer(s.length);
                        var view = new Uint8Array(buf);
                        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                        return buf;
        }
        $("#button-a").click(function(){
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'report.xlsx');
        });
    });


})