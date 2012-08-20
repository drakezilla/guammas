<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>¡Empresa creada!</h3>
        <div class="form-separador">
            <?php echo image_tag('comun/linea.png') ?>
        </div>
    </div>
    <div>
        <p>¡Tu cuenta ha sido creada con exito!</p>
        <p>Por favor haz click en el siguiente enlace para confirmar la creacion de tu cuenta</p>
        <p><a href="<?php echo url_for('http://localhost/guammas/web/frontend_dev.php/activarEmpresa/'.$token) ?>"><?php echo url_for('http://localhost/guammas/web/frontend_dev.php/activarEmpresa/'.$token) ?></a></p>
        <p>¡Activa tu cuenta para poder comenzar a usar Guammas ahora mismo!</p>
        <p>Podras recibir información sobre actualizaciones y otras cosas importantes de guammas en nuestro blog <a href="#">http://blog.guammas.com</a></p>
        <p>Y recuerda que siempre podras estar en contacto con nostros a través de nuestro <a href="#">Twitter</a> o nuestra <a href="#">Pagina en Facebook</a></p>
        <p>Nuevamente, muchas gracias por usar Guammas :D</p>
    </div>
</div>