 $("#btnAgregarGastronomia").click(function () {

     $("#agregarGastronomia").toggle(400);

 })

 $("#subirGastro").change(function () {

     imagen = this.files[0];

     //Validar tamaño de la imagen

     imagenSize = imagen.size;

     if (Number(imagenSize) > 2000000) {

         $("#arrastreImagenGastronomia").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

     } else {

         $(".alerta").remove();

     }

     // Validar tipo de la imagen

     imagenType = imagen.type;

     if (imagenType == "image/jpeg" || imagenType == "image/png") {

         $(".alerta").remove();
     } else {

         $("#arrastreImagenGastronomia").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

     }

     /*=============================================
     Mostrar imagen con AJAX      
     =============================================*/
     if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

         var datos = new FormData();

         datos.append("imagen", imagen);

         $.ajax({
             url: "views/ajax/gestorGastronomia.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function () {

                 $("#arrastreImagenGastronomia").before('<img src="themes/admin/images/status.gif" id="status">');

             },
             success: function (respuesta) {


                 $("#status").remove();

                 if (respuesta == 0) {

                     $("#arrastreImagenGastronomia").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                 } else {

                     $("#arrastreImagenGastronomia").html('<div id="imagenGastro"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                 }

             }

         })

     }


 })

 $("#subirGastro1").change(function () {

     imagen = this.files[0];

     //Validar tamaño de la imagen

     imagenSize = imagen.size;

     if (Number(imagenSize) > 2000000) {

         $("#arrastreImagenGastronomia1").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

     } else {

         $(".alerta").remove();

     }

     // Validar tipo de la imagen

     imagenType = imagen.type;

     if (imagenType == "image/jpeg" || imagenType == "image/png") {

         $(".alerta").remove();
     } else {

         $("#arrastreImagenGastronomia1").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

     }

     /*=============================================
     Mostrar imagen con AJAX       
     =============================================*/
     if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

         var datos = new FormData();

         datos.append("imagen", imagen);
         console.log("imagen", imagen);

         $.ajax({
             url: "views/ajax/gestorGastronomia.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function () {

                 $("#arrastreImagenGastronomia1").before('<img src="themes/admin/images/status.gif" id="status">');

             },
             success: function (respuesta) {
                 //console.log('respuesta', respuesta);

                 $("#status").remove();

                 if (respuesta == 0) {

                     $("#arrastreImagenGastronomia1").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                 } else {
                     dataFiles[1] = respuesta.slice(6);
                     console.log('dataFiles', dataFiles[1]);
                     $("#arrastreImagenGastronomia1").html('<div id="imagenGastro1"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                 }

             }

         })

     }

 })


 $(".editarGastro").click(function () {

     idGastro = $(this).parent().parent().attr("id");
     rutaImagen = $("#" + idGastro).children("div").children("#img").attr("src");
     rutaImageni = $("#" + idGastro).children("div").children("#imgi").attr("src");
     titulo = $("#" + idGastro).children("h1").html();
     introduccion = $("#" + idGastro).children("p").html();
     contenido = $("#" + idGastro).children("input").val();

     $("#" + idGastro).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span> <div class="imgMostrar"><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img id="img" src="' + rutaImagen + '" class="img-thumbnail"></div></div></span><div id="editarImageni"><input style="display:none" type="file" id="subirNuevaFotoi" class="btn btn-default"><div id="nuevaFotoi"><span class="fa fa-times cambiarImageni"></span><img id="imgi" src="' + rutaImageni + '" class="img-thumbnail"></div></div></span><input type="text" value="' + titulo + '" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">' + introduccion + '</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">' + contenido + '</textarea><input type="hidden" value="' + idGastro + '" name="id"><input type="hidden" value="' + rutaImagen + '" name="fotoAntigua0"><input type="hidden" value="' + rutaImageni + '" name="fotoAntigua1"><hr></form>');

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
                     url: "views/ajax/gestorGastronomia.php",
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

                             $("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                         } else {

                             $("#nuevaFoto").html('<img src="' + respuesta.slice(6) + '" class="img-thumbnail">');

                         }

                     }

                 })

             }

         })

     })


     $(".cambiarImageni").click(function () {

         $(this).hide();

         $("#subirNuevaFotoi").show();
         $("#subirNuevaFotoi").css({
             "width": "90%"
         });
         $("#nuevaFotoi").html("");
         $("#subirNuevaFotoi").attr("name", "editarImageni");
         $("#subirNuevaFotoi").attr("required", true);

         $("#subirNuevaFotoi").change(function () {

             imagen = this.files[0];
             imagenSize = imagen.size;

             if (Number(imagenSize) > 2000000) {

                 $("#editarImageni").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

             } else {

                 $(".alerta").remove();

             }

             imagenType = imagen.type;

             if (imagenType == "image/jpeg" || imagenType == "image/png") {

                 $(".alerta").remove();

             } else {

                 $("#editarImageni").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

             }

             if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

                 var datos = new FormData();

                 datos.append("imagen", imagen);

                 $.ajax({
                     url: "views/ajax/gestorGastronomia.php",
                     method: "POST",
                     data: datos,
                     cache: false,
                     contentType: false,
                     processData: false,
                     beforeSend: function () {

                         $("#nuevaFotoi").html('<img src="themes/admin/images/status.gif" style="width:15%" id="status2">');

                     },
                     success: function (respuesta) {

                         $("#status2").remove();

                         if (respuesta == 0) {

                             $("#editarImageni").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                         } else {

                             $("#nuevaFotoi").html('<img id="imgi" src="' + respuesta.slice(6) + '" class="img-thumbnail">');

                         }

                     }

                 })

             }

         })

     })

 })



 var almacenarOrdenId = new Array();
 var ordenItem = new Array();

 $("#ordenarGastronomia").click(function () {

     $("#ordenarGastronomia").hide();
     $("#guardarOrdenGastronomia").show();

     $("#editarGastro").css({
         "cursor": "move"
     })
     $("#editarGastro span i").hide()
     $("#editarGastro button").hide()
     $("#editarGastro img").hide()
     $("#editarGastro p").hide()
     $("#editarGastro hr").hide()
     $("#editarGastro div").remove()
     $(".bloqueGastro h1").css({
         "font-size": "15px",
         "position": "absolute",
         "padding": "10px",
         "top": "-15px"
     })
     $(".bloqueGastro").css({
         "padding": "2px"
     })
     $("#editarGastro span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>')

     $("body, html").animate({

         scrollTop: $("body").offset().top

     }, 500)

     $("#editarGastro").sortable({
         revert: true,
         connectWith: ".bloqueGastro",
         handle: ".handleGastro",
         stop: function (event) {

             for (var i = 0; i < $("#editarGastro li").length; i++) {

                 almacenarOrdenId[i] = event.target.children[i].id;
                 ordenItem[i] = i + 1;

             }
         }
     })

     $("#guardarOrdenGastronomia").click(function () {

         $("#ordenarGastronomia").show();
         $("#guardarOrdenGastronomia").hide();

         for (var i = 0; i < $("#editarGastro li").length; i++) {

             var actualizarOrden = new FormData();
             actualizarOrden.append("actualizarOrdenGastronomia", almacenarOrdenId[i]);
             actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

             $.ajax({

                 url: "views/ajax/gestorGastronomia.php",
                 method: "POST",
                 data: actualizarOrden,
                 cache: false,
                 contentType: false,
                 processData: false,
                 success: function (respuesta) {

                     $("#editarGastro").html(respuesta);

                     swal({
                             title: "¡OK!",
                             text: "¡El orden se ha actualizado correctamente!",
                             type: "success",
                             confirmButtonText: "Cerrar",
                             closeOnConfirm: false
                         },
                         function (isConfirm) {
                             if (isConfirm) {
                                 window.location = "gastronomia";
                             }
                         });


                 }

             })



         }

     })

 })
