<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>¡Cuenta activada!</h3>
        <div class="form-separador"></div>
    </div>
    <div class="span-11 colborder" style="padding-left: 36px; padding-top: 24px">
        <p><?php echo ucfirst($sf_request->getParameter('usuarionombre')) ?>, ¡Ya tu cuenta esta activada!</p>
        <p>¿Nos suministras algunos datos mas?</p>
        <div>
            <button class="form-btn form-btn-cancelar" type="button" onclick="location.href='<?php echo url_for('@homepage') ?>'">
                <span>No, gracias</span>
            </button>
            <button class="form-btn form-btn-confirmar" type="button" id="btn-guardar">
                <span>¡Listo!</span>
            </button>
        </div>
    </div>
    <div class="span-5 last prepend-1 pan-info">
        Siempre podras modificar tus datos haciendo click en el botón de <strong>'Configuracion de usuario'</strong><?php echo image_tag('stylistica-icons/24x24/process.png') ?>
    </div>
</div>