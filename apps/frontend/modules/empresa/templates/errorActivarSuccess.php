<div class=" prepend-4 span-20 last">
    <div class="form-header">
        <h3>ejem... algo no esta bien...</h3>
        <div class="form-separador">
            <?php echo image_tag('comun/linea.png') ?>
        </div>
    </div>
    <div>
        <p><?php echo ucfirst($sf_request->getParameter('usuarionombre')) ?> Si llegaste aqui sin querer (o queriendo) no estas haciendo nada, ya tu cuenta esta activa</p>
        <p>Será mejor que <a href="<?php echo url_for('@homepage') ?>">regreses al inicio</a>, aquí no hay mucho para hacer</p>
    </div>
</div>