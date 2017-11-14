$("#btnAgregarFestival").click(function () {

    $("#agregarFestival").toggle(400);

})



$("#subirFes").change(function () {

    imagen = this.files[0];

    //Validar tamaño de la imagen

    imagenSize = imagen.size;

    if (Number(imagenSize) > 2000000) {

        $("#arrastreImagenFestival").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

    } else {

        $(".alerta").remove();

    }

    // Validar tipo de la imagen

    imagenType = imagen.type;

    if (imagenType == "image/jpeg" || imagenType == "image/png") {

        $(".alerta").remove();
    } else {

        $("#arrastreImagenFestival").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

    }

    /*=============================================
    Mostrar imagen con AJAX      
    =============================================*/
    if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

        var datos = new FormData();

        datos.append("imagen", imagen);
        console.log("imagen", imagen);
        $.ajax({
            url: "views/ajax/gestorFestividad.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

                $("#arrastreImagenFestival").before('<img src="themes/admin/images/status.gif" id="status">');

            },
            success: function (respuesta) {


                $("#status").remove();

                if (respuesta == 0) {

                    $("#arrastreImagenFestival").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                } else {
                    dataFiles[0] = respuesta.slice(6);
                    console.log('dataFiles', dataFiles[0]);
                    $("#arrastreImagenFestival").html('<div id="imagenFestival"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                }

            }

        })

    }


})



$(".editarFestival").click(function () {

    idFestival = $(this).parent().parent().attr("id");
    rutaImagen = $("#" + idFestival).children("div").children("#img").attr("src");
    titulo = $("#" + idFestival).children("h1").html();
    introduccion = $("#" + idFestival).children("p").html();
    inicio = $("#" + idFestival).children("div").children("#ini").html();
    fin = $("#" + idFestival).children("div").children("#fin").html();
    mes = $("#" + idFestival).children("div").children("#mes").html();


    $("#" + idFestival).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar Cambios"></span> <div class="imgMostrar"><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img id="img" src="' + rutaImagen + '" class="img-thumbnail"></div></div></span><input type="text" value="' + titulo + '" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">' + introduccion + '</textarea><textarea cols="10"  rows="1" name="editarInicio" >' + inicio + '</textarea><textarea name="editarFin"  cols="10" rows="1">' + fin + '</textarea><textarea name="editarMes" cols="10" rows="1">' + mes + '</textarea><input type="hidden" value="' + idFestival + '" name="id"><input type="hidden" value="' + rutaImagen + '" name="fotoAntigua"><hr></form>');

    $(".cambiarImagen").click(function () {

        $(this).hide();

        $("#subirNuevaFoto").show();
        $("#subirNuevaFoto").css({
            "width": "90%"
        });
        $("#nuevaFoto").html("");
        $("#subirNuevaFoto").attr("name", "editarImagen");
        $("#subirNuevaFoto").attr("required", true);

        $("#subirNuevaFoto").change(function () {

            imagen = this.files[0];
            imagenSize = imagen.size;

            if (Number(imagenSize) > 2000000) {

                $("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

            } else {

                $(".alerta").remove();

            }

            imagenType = imagen.type;

            if (imagenType == "image/jpeg" || imagenType == "image/png") {

                $(".alerta").remove();

            } else {

                $("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

            }

            if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

                var datos = new FormData();

                datos.append("imagen", imagen);
                console.log("imagenC", imagen);
                $.ajax({
                    url: "views/ajax/gestorFestividad.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {

                        $("#nuevaFoto").html('<img src="themes/admin/images/status.gif" style="width:15%" id="status2">');

                    },
                    success: function (respuesta) {

                        $("#status2").remove();
                        console.log("respuestaC", respuesta);
                        if (respuesta == 0) {

                            $("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                        } else {

                            $("#nuevaFoto").html('<img src="' + respuesta.slice(6) + '" class="img-thumbnail">');

                        }

                    }

                })

            }

        })

    })


})

var ordenarFestival = new Array();
var ordenItem = new Array();

$("#ordenarFestival").click(function () {

    $("#ordenarFestival").hide();
    $("#guardarOrdenFestival").show();

    $("#editarFestival").css({
        "cursor": "move"
    })
    $("#editarFestival span i").hide()
    $("#editarFestival button").hide()
    $("#editarFestival img").hide()
    $("#editarFestival p").hide()
    $("#editarFestival hr").hide()
    $("#editarFestival div").remove()
    $(".bloqueFestival h1").css({
        "font-size": "15px",
        "position": "absolute",
        "padding": "10px",
        "top": "-15px"
    })
    $(".bloqueFestival").css({
        "padding": "2px"
    })
    $("#editarFestival span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>')

    $("body, html").animate({

        scrollTop: $("body").offset().top

    }, 500)

    $("#editarFestival").sortable({
        revert: true,
        connectWith: ".bloqueFestival",
        handle: ".handleArticle",
        stop: function (event) {

            for (var i = 0; i < $("#editarFestival li").length; i++) {

                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i] = i + 1;

            }
        }
    })

    $("#guardarOrdenFestival").click(function () {

        $("#ordenarFestival").show();
        $("#guardarOrdenFestival").hide();

        for (var i = 0; i < $("#editarFestival li").length; i++) {

            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenFestival", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

            $.ajax({

                url: "views/ajax/gestorFestividad.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {

                    $("#editarFestival").html(respuesta);

                    swal({
                            title: "¡OK!",
                            text: "¡El orden se ha actualizado correctamente!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location = "festividad";
                            }
                        });


                }

            })



        }

    })

})
