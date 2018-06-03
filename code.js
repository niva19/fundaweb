var cont = 8;

$(document).ready(function () {

    $("#comparar").click(function () {
        let checkboxes = $('.chk:checked')
        if (checkboxes.length > 1) {
            var arr = []
            for (let i = 0; i < checkboxes.length; i++) {
                arr.push(checkboxes[i].attributes[2].nodeValue)
            }
            window.location.href = `tabla.php?valor=${JSON.stringify(arr)}`;
        }
        else alert("debe elegir al menos 2 equipos")
    })

    $("#decrement").click(function () {
        if (cont != 1) {
            $.ajax({
                data: { 'action': 'Inc_Dec' },
                url: 'ajax.php',
                type: 'post',
                success: function (res) {
                    cont--;
                    $("#titulo").html("Ultimos " + cont + " Juegos");
                    res = JSON.parse(res)
                    $(".Ujuegos").html("");
                    var trt = $("#table_body").children();
                    for (let i = 0; i < trt.length; i++) {
                        var Ujuegos = trt[i].children[11];

                        var table = document.createElement("table");
                        var tr = document.createElement("tr");

                        for (let k = 0; k < cont; k++) {
                            var td = document.createElement("td");
                            var textnode = document.createTextNode(res[i][k]);
                            td.appendChild(textnode);
                            if (res[i][k] == "P")
                                td.style.cssText = 'background: red';
                            else if (res[i][k] == "G")
                                td.style.cssText = 'background: green';
                            else
                                td.style.cssText = 'background: yellow';
                            tr.appendChild(td);
                        }
                        table.appendChild(tr)
                        Ujuegos.appendChild(table);
                    }
                }
            });
        }

    });
    $("#increment").click(function () {
        if (cont != 40) {
            $.ajax({
                data: { 'action': 'Inc_Dec' },
                url: 'ajax.php',
                type: 'post',
                success: function (res) {
                    cont++;
                    $("#titulo").html("Ultimos " + cont + " Juegos");
                    res = JSON.parse(res)
                    $(".Ujuegos").html("");
                    var trt = $("#table_body").children();
                    for (let i = 0; i < trt.length; i++) {
                        var Ujuegos = trt[i].children[11];

                        var table = document.createElement("table");
                        var tr = document.createElement("tr");

                        for (let k = 0; k < cont; k++) {
                            var td = document.createElement("td");
                            var textnode = document.createTextNode(res[i][k]);
                            td.appendChild(textnode);
                            if (res[i][k] == "P")
                                td.style.cssText = 'background: red';
                            else if (res[i][k] == "G")
                                td.style.cssText = 'background: green';
                            else
                                td.style.cssText = 'background: yellow';
                            tr.appendChild(td);
                        }
                        table.appendChild(tr)
                        Ujuegos.appendChild(table);
                    }
                }
            });
        }

    });
});


