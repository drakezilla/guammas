<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>¡Cuenta creada!</h3>
        <div class="form-separador">
            <?php echo image_tag('comun/linea.png') ?>
        </div>
    </div>
    <div>
        <p>Hola, <?php echo $usuario ?> ¡Tu cuenta ha sido creada con exito!</p>
        <p>Gracias por registrarte en Guammas. Si alguna vez has buscado un lugar y no sabes donde esta ¡comienza buscado aquí!</p>
        <p>Cierto, vamos a activar tu cuenta. Haz click en este link más abajo</p>
        <p><a href="<?php echo url_for('http://localhost/guammas/web/frontend_dev.php/activarUsuario/'.$usuario) ?>"><?php echo url_for('http://localhost/guammas/web/frontend_dev.php/activarUsuario/'.$usuario) ?></a></p>
        <p>Podras recibir información sobre actualizaciones y otras cosas importantes de Guammas en nuestro blog <a href="#">http://blog.guammas.com</a></p>
        <p>Y recuerda que siempre podras estar en contacto con nostros a través de nuestro <a href="#">Twitter</a> o nuestra <a href="#">Pagina en Facebook</a></p>
        <p>Nuevamente, muchas gracias por usar Guammas :D</p>
        <p>-- El equipo de Guammas --</p>
    </div>
</div>