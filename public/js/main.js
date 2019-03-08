
var updatePeriod=3000;  //initial update period
var intervalID;

//set update on loading
$(document).ready(function() {
    intervalID = setInterval(function () {
        getPoll();
    }, updatePeriod);
});


//change update period on button "1 sec" click
$(".button_1sec").click(function () {
    updatePeriod=1000;
    clearInterval(intervalID);
    intervalID = setInterval(function () {
        getPoll();
    }, updatePeriod);
});

//change update period on button "3 sec" click
$(".button_3sec").click(function () {
    updatePeriod=3000;
    clearInterval(intervalID);
    intervalID = setInterval(function () {
        getPoll();
    }, updatePeriod);

});

//change update period on button "5 sec" click
$(".button_5sec").click(function () {
    updatePeriod=5000;
    clearInterval(intervalID);
    intervalID = setInterval(function () {
        getPoll();
    }, updatePeriod);
});




//ajax request results from database and updating table with voting results

function getPoll() {
var table='';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/pollresults",
        data: {
            "_token": $('#token').val()
        },
        success: function (data) {

            table=table+'<table class="table table-striped" id="records_table">\n' +
                '    <thead>\n' +
                '    <tr>\n' +
                '        <th scope="col">id</th>\n' +
                '        <th scope="col">Name</th>\n' +
                '        <th scope="col">Votes</th>\n' +
                '    </tr>\n' +
                '    </thead>\n' +
                '    <tbody>';

            $.each(data, function (i, item) {
            table=table+'<tr><th scope="row">'+item.id+'</th><td>'+item.name+'</td><td>'
                +item.voters_info_count+'</td></tr>'
            });
            table=table+'</tbody></table>';
            $('#tbl').html(table);
        }


    })
}