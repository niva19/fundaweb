$(document).ready(function () {
    $.ajax({
        data: {'action': 'distancias'},
        url:   'ajax.php',
        type:  'post',
        success:  function (res) {
            var val = JSON.parse(res)
            draw_columns(val[1]);
            calculate_distance(val[0]);
        }
    });
});

function draw_columns(cols){
    $("#cols").append(`<th>EQUIPO     </th>`)
    cols.forEach(e => {
        $("#cols").append(`<th>${e.Id}</th>`)
    });
    $("#cols").append('<th>TOTAL</th>')
}

function calculate_distance(arr){
    // var tr = $("<tr></tr>")
    // tr.append("<td>aaa</td>")
    // $("#t_body").append(tr)

    console.log(arr)

    arr.forEach(e1 => {
        var tr = $("<tr></tr>")
        tr.append($("<td></td>").text(e1.Nombre))
        console.log(e1.Nombre)
        var total = 0;
        arr.forEach(e2 => {
            console.log(e2)
            var td = $("<td></td>")
            if(e1.Nombre != e2.Nombre){
                var start = new google.maps.LatLng(parseFloat(e1.Latitud), parseFloat(e2.Longitud));
                var end = new google.maps.LatLng(parseFloat(e2.Latitud), parseFloat(e1.Longitud));
                var distance = google.maps.geometry.spherical.computeDistanceBetween(start, end);
                var red = (distance/1000).toFixed(1)
                td.text(`${red}`)
                total += parseFloat(red)
            }
            else{
                td.text("-")
            }       
            tr.append(td)
        });
        tr.append($("<td></td>").text(total.toFixed(1)))
        $("#t_body").append(tr) 
    });
    // console.log(arr)
}