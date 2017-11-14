 var dataFiles = new Array(2);
 /*=============================================
 Agregar artículo          
 =============================================*/
 $("#btnAgregarServicios").click(function () {

     $("#agregarServicios").toggle(400);

 })

 /*=============================================
 Subir Imagen a través del Input         
 =============================================*/


 $("#subirServ").change(function () {

     imagen = this.files[0];

     //Validar tamaño de la imagen

     imagenSize = imagen.size;

     if (Number(imagenSize) > 2000000) {

         $("#arrastreImagenServicios").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

     } else {

         $(".alerta").remove();

     }

     // Validar tipo de la imagen

     imagenType = imagen.type;

     if (imagenType == "image/jpeg" || imagenType == "image/png") {

         $(".alerta").remove();
     } else {

         $("#arrastreImagenServicios").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

     }

     /*=============================================
     Mostrar imagen con AJAX      
     =============================================*/
     if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

         var datos = new FormData();

         datos.append("imagen", imagen);
         console.log("imagen", imagen);
         $.ajax({
             url: "views/ajax/gestorServicios.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function () {

                 $("#arrastreImagenServicios").before('<img src="themes/admin/images/status.gif" id="status">');

             },
             success: function (respuesta) {


                 $("#status").remove();

                 if (respuesta == 0) {

                     $("#arrastreImagenServicios").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                 } else {
                     dataFiles[0] = respuesta.slice(6);
                     console.log('dataFiles', dataFiles[0]);
                     $("#arrastreImagenServicios").html('<div id="imagenServicios"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                 }

             }

         })

     }


 })

 $("#subirServ1").change(function () {

     imagen = this.files[0];

     //Validar tamaño de la imagen

     imagenSize = imagen.size;

     if (Number(imagenSize) > 2000000) {

         $("#arrastreImagenServicios1").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

     } else {

         $(".alerta").remove();

     }

     // Validar tipo de la imagen

     imagenType = imagen.type;

     if (imagenType == "image/jpeg" || imagenType == "image/png") {

         $(".alerta").remove();
     } else {

         $("#arrastreImagenServicios1").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

     }

     /*=============================================
     Mostrar imagen con AJAX       
     =============================================*/
     if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

         var datos = new FormData();

         datos.append("imagen", imagen);
         console.log("imagen", imagen);

         $.ajax({
             url: "views/ajax/gestorServicios.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function () {

                 $("#arrastreImagenServicios1").before('<img src="themes/admin/images/status.gif" id="status">');

             },
             success: function (respuesta) {
                 //console.log('respuesta', respuesta);

                 $("#status").remove();

                 if (respuesta == 0) {

                     $("#arrastreImagenServicios1").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                 } else {
                     dataFiles[1] = respuesta.slice(6);
                     console.log('dataFiles', dataFiles[1]);
                     $("#arrastreImagenServicios1").html('<div id="imagenServicios1"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                 }

             }

         })

     }

 })

 $("#subirServ2").change(function () {

     imagen = this.files[0];

     //Validar tamaño de la imagen
     imagenSize = imagen.size;
     if (Number(imagenSize) > 2000000) {

         $("#arrastreImagenServicios2").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

     } else {

         $(".alerta").remove();

     }

     // Validar tipo de la imagen
     imagenType = imagen.type;
     if (imagenType == "image/jpeg" || imagenType == "image/png") {
         $(".alerta").remove();
     } else {

         $("#arrastreImagenServicios2").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

     }

     /*=============================================
     Mostrar imagen con AJAX       
     =============================================*/
     if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

         var datos = new FormData();

         datos.append("imagen", imagen);
         console.log("imagen", imagen);

         $.ajax({
             url: "views/ajax/gestorServicios.php",
             method: "POST",
             data: datos,
             cache: false,
             contentType: false,
             processData: false,
             beforeSend: function () {

                 $("#arrastreImagenServicios2").before('<img src="themes/admin/images/status.gif" id="status">');

             },
             success: function (respuesta) {
                 //console.log('respuesta', respuesta);

                 $("#status").remove();

                 if (respuesta == 0) {

                     $("#arrastreImagenServicios2").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                 } else {
                     dataFiles[2] = respuesta.slice(6);
                     console.log('dataFiles', dataFiles[2]);
                     $("#arrastreImagenServicios2").html('<div id="imagenServicios2"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');

                 }

             }

         })

     }

 })

 $(".editarServicios").click(function () {

     idServicios = $(this).parent().parent().attr("id");
     rutaImagen = $("#" + idServicios).children("div").children("#img").attr("src");
     rutaImageni = $("#" + idServicios).children("div").children("#imgi").attr("src");
     rutaImagenii = $("#" + idServicios).children("div").children("#imgii").attr("src");
     titulo = $("#" + idServicios).children("h1").html();
     introduccion = $("#" + idServicios).children("p").html();
     contenido = $("#" + idServicios).children("input").val();

     $("#" + idServicios).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span> <div class="imgMostrar"><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img id="img" src="' + rutaImagen + '" class="img-thumbnail"></div></div></span><div id="editarImageni"><input style="display:none" type="file" id="subirNuevaFotoi" class="btn btn-default"><div id="nuevaFotoi"><span class="fa fa-times cambiarImageni"></span><img id="imgi" src="' + rutaImageni + '" class="img-thumbnail"></div></div></span><div id="editarImagenii"><input style="display:none" type="file" id="subirNuevaFotoii" class="btn btn-default"><div id="nuevaFotoii"><span class="fa fa-times cambiarImagenii"></span><img id="imgii" src="' + rutaImagenii + '" class="img-thumbnail"></div></div></div><input type="text" value="' + titulo + '" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">' + introduccion + '</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">' + contenido + '</textarea><input type="hidden" value="' + idServicios + '" name="id"><input type="hidden" value="' + rutaImagen + '" name="fotoAntigua0"><input type="hidden" value="' + rutaImageni + '" name="fotoAntigua1"><input type="hidden" value="' + rutaImagenii + '" name="fotoAntigua2"><hr></form>');

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
                     url: "views/ajax/gestorServicios.php",
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
                     url: "views/ajax/gestorServicios.php",
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


     $(".cambiarImagenii").click(function () {

         $(this).hide();

         $("#subirNuevaFotoii").show();
         $("#subirNuevaFotoii").css({
             "width": "90%"
         });
         $("#nuevaFotoii").html("");
         $("#subirNuevaFotoii").attr("name", "editarImagenii");
         $("#subirNuevaFotoii").attr("required", true);

         $("#subirNuevaFotoii").change(function () {

             imagen = this.files[0];
             imagenSize = imagen.size;

             if (Number(imagenSize) > 2000000) {

                 $("#editarImagenii").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

             } else {

                 $(".alerta").remove();

             }

             imagenType = imagen.type;

             if (imagenType == "image/jpeg" || imagenType == "image/png") {

                 $(".alerta").remove();

             } else {

                 $("#editarImagenii").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

             }

             if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {

                 var datos = new FormData();

                 datos.append("imagen", imagen);

                 $.ajax({
                     url: "views/ajax/gestorServicios.php",
                     method: "POST",
                     data: datos,
                     cache: false,
                     contentType: false,
                     processData: false,
                     beforeSend: function () {

                         $("#nuevaFotoii").html('<img src="themes/admin/images/status.gif" style="width:15%" id="status2">');

                     },
                     success: function (respuesta) {

                         $("#status2").remove();

                         if (respuesta == 0) {

                             $("#editarImagenii").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

                         } else {

                             $("#nuevaFotoii").html('<img id="imgii" src="' + respuesta.slice(6) + '" class="img-thumbnail">');

                         }

                     }

                 })

             }

         })

     })

 })

 /*=============================================
 Ordenar Item Artículos
 =============================================*/

 var almacenarOrdenId = new Array();
 var ordenItem = new Array();

 $("#ordenarServicios").click(function () {

     $("#ordenarServicios").hide();
     $("#guardarOrdenServicios").show();

     $("#editarServicios").css({
         "cursor": "move"
     })
     $("#editarServicios span i").hide()
     $("#editarServicios button").hide()
     $("#editarServicios img").hide()
     $("#editarServicios p").hide()
     $("#editarServicios hr").hide()
     $("#editarServicios div").remove()
     $(".bloqueServicios h1").css({
         "font-size": "15px",
         "position": "absolute",
         "padding": "10px",
         "top": "-15px"
     })
     $(".bloqueServicios").css({
         "padding": "2px"
     })
     $("#editarServicios span").html('<i class="glyphicon glyphicon-move" style="padding:8px"></i>')

     $("body, html").animate({

         scrollTop: $("body").offset().top

     }, 500)

     $("#editarServicios").sortable({
         revert: true,
         connectWith: ".bloqueServicios",
         handle: ".handleServicios",
         stop: function (event) {

             for (var i = 0; i < $("#editarServicios li").length; i++) {

                 almacenarOrdenId[i] = event.target.children[i].id;
                 ordenItem[i] = i + 1;

             }
         }
     })

     $("#guardarOrdenServicios").click(function () {

         $("#ordenarServicios").show();
         $("#guardarOrdenServicios").hide();

         for (var i = 0; i < $("#editarServicios li").length; i++) {

             var actualizarOrden = new FormData();
             actualizarOrden.append("actualizarOrdenServicios", almacenarOrdenId[i]);
             actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

             $.ajax({

                 url: "views/ajax/gestorServicios.php",
                 method: "POST",
                 data: actualizarOrden,
                 cache: false,
                 contentType: false,
                 processData: false,
                 success: function (respuesta) {

                     $("#editarServicios").html(respuesta);

                     swal({
                             title: "¡OK!",
                             text: "¡El orden se ha actualizado correctamente!",
                             type: "success",
                             confirmButtonText: "Cerrar",
                             closeOnConfirm: false
                         },
                         function (isConfirm) {
                             if (isConfirm) {
                                 window.location = "servicios";
                             }
                         });


                 }

             })



         }

     })

 })
