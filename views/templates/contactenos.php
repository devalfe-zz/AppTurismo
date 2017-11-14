<div class="internas">
    <section class="bienvenidos">
        <?php include "views/templates/header.php";?>
            <div class="text-encabezado text-center">
                <div class="container">
                    <h1 class="display-4 wow slideInLeft">Contáctenos</h1>
                    <p class="wow bounceIn" data-wow-delay=".3s">¿Quines somos? y ¿Que hacemos?</p>
                </div>
            </div>
    </section>
    <div class="ruta">
        <div class="container">
            <row>
                <div class=" bar col-12 text-right">
                    <a href="index.php">Inicio</a> » Contáctenos
                </div>
            </row>
        </div>
    </div>
    <main class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="mb-2">CONTÁCTENOS</h2>
                    <form method="post" onsubmit="return validarMensaje()">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label">Nombre</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mensaje" class="col-md-4 col-form-label">Mensaje</label>

                            <div class="col-md-8">
                                <textarea class="form-control" rows="5" id="mensaje" name="mensaje" placeholder="Ingrese su mensaje" data-toggle="tooltip" data-placement="top" title="Ingrese un mensaje" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </div>
                    </form>
                    <?php $mensajes = (new MensajesController)->registroMensajesController(); ?>
                </div>
                <div class="col-md-4">
                   
                </div>
            </div>
        </div>

    </main>
</div>
