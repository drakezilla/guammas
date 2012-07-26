<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>¡Cuenta activada!</h3>
        <div class="form-separador"></div>
    </div>
    <div class="span-11 colborder" style="padding-left: 36px; padding-top: 24px">
        <p><?php echo ucfirst($sf_user->getAttribute('usuario_username', '', 'user_vars')) ?>, ¡Tu Empresa ya esta activada!</p>
        <div>
            <p>Gracias! tu empresa ya esta activa. Ya va a aperecer en los resultados de busqueda, en el mapa y otros lugares de guammas. <br />
                Que quieres hacer ahora?
            <ul>
                <li>Crear un anuncio o promocion</li>
                <li>Tengo otra ubicacion de esta tienda ademas, la voy a agregar ahora</li>
                <li>Creo que estoy bien por ahora, gracias!!</li>
            </ul>
            </p>
            <button class="form-btn form-btn-confirmar" type="button" onclick="location.href='<?php echo url_for('@homepage') ?>'">
                <span>¡Vamonos!</span>
            </button>
        </div>
    </div>
    <div class="span-5 last prepend-1 pan-info">
        Recuerda que puedes acceder a tu <strong>'Panel de Control'</strong> haciendole click este icono <?php echo image_tag('stylistica-icons/24x24/id_card.png') ?>
    </div>
</div>