/*=============================================
Área de arrastre de imágenes
=============================================*/
$("#btnAgregarImagen").click(function () {

    $("#agregarImagen").toggle(400);

})

$("#subirImagen").change(function () {

    imagen = this.files[0];
    //Validar tamaño de la imagen
    imagenSize = imagen.size;
    if (Number(imagenSize) > 2000000) {
        $("#arrastreImagenGaleria").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 2mb</div>')

    } else {
        $(".alerta").remove();
    }
    // Validar tipo de la imagen

    imagenType = imagen.type;

    if (imagenType == "image/jpeg" || imagenType == "image/png") {

        $(".alerta").remove();
    } else {

        $("#arrastreImagenGaleria").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

    }

    /*=============================================
    Mostrar imagen con AJAX      
    =============================================*/
    if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

        var datos = new FormData();

        datos.append("imagen", imagen);
        console.log("imagen", imagen);
        $.ajax({
            url: "views/ajax/gestorGaleria.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {

                $("#arrastreImagenGaleria").before('<img src="themes/admin/images/status.gif" id="status">');

            },
            success: function (respuesta) {


                $("#status").remove();

                if (respuesta == 0) {

                    $("#arrastreImagenGaleria").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 1024px * 768px</div>')


                } else {
                    dataFiles = respuesta.slice(6);
                    console.log('dataFiles', dataFiles);
                    $("#arrastreImagenGaleria").html('<div id="imagenGaleria"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                }

            }

        })

    }


})

$(".editarGaleria").click(function () {
    idGaleria = $(this).parent().parent().attr("id");
    rutaImagen = $("#" + idGaleria).children("div").children("#img").attr("src");
    titulo = $("#" + idGaleria).children("h1").html();
    introduccion = $("#" + idGaleria).children("p").html();
    //console.log("titulo", titulo);
    //console.log("intro", introduccion);
    //console.log("id", idGaleria);
    //console.log("ruta", rutaImagen);
    $("#" + idGaleria).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span> <div class="imgMostrar"><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img id="img" src="' + rutaImagen + '" class="img-thumbnail"></div></div></span><input type="text" value="' + titulo + '" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">' + introduccion + '</textarea><input type="hidden" value="' + idGaleria + '" name="id"><input type="hidden" value="' + rutaImagen + '" name="fotoAntigua"><hr></form>');
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

                $.ajax({
                    url: "views/ajax/gestorGaleria.php",
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

                        if (respuesta == 0) {

                            $("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 1024px * 768px</div>')

                        } else {

                            $("#nuevaFoto").html('<img src="' + respuesta.slice(6) + '" class="img-thumbnail">');

                        }

                    }

                })

            }

        })
    })
})


var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarGaleria").click(function () {
    $("#ordenarGaleria").hide();
    $("#guardarGaleria").show();
    $("#editarGaleria").css({
        "cursor": "move"
    })

    $("#editarGaleria span i").hide()
    $("#editarGaleria button").hide()
    $("#editarGaleria img").hide()
    $("#editarGaleria p").hide()
    $("#editarGaleria hr").hide()
    $("#editarGaleria div").remove()

    $(".bloqueGaleria h1").css({
        "font-size": "15px",
        "position": "absolute",
        "padding": "10px",
        "top": "-15px"
    })
    $(".bloqueGaleria").css({
        "padding": "2px"
    })

    $("#editarGaleria span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>')

    $("body, html").animate({

        scrollTop: $("body").offset().top

    }, 500)

    $("#editarGaleria").sortable({
        revert: true,
        connectWith: ".bloqueGaleria",
        handle: ".handleGaleria",
        stop: function (event) {

            for (var i = 0; i < $("#editarGaleria li").length; i++) {

                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i] = i + 1;

            }
        }
    })

    $("#guardarGaleria").click(function () {

        $("#guardarGaleria").hide();
        $("#ordenarGaleria").show();

        for (var i = 0; i < $("#editarGaleria li").length; i++) {

            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenGaleria", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

            $.ajax({

                url: "views/ajax/gestorGaleria.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {

                    $("#editarGaleria").html(respuesta);

                    swal({
                            title: "¡OK!",
                            text: "¡El orden se ha actualizado correctamente!",
                            type: "success",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location = "galeria";
                            }
                        });

                }

            })

        }

    })
})
