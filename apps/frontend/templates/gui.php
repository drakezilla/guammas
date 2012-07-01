<div class="span-24 last" id="gui">
    <div class="span-4" id="lay-header-logo"></div>
    <div class="span-20 last" id="lay-header-user-panel">
        <div id="panel-empresa">
            <?php echo image_tag('stylistica-icons/24x24/search.png') ?>
            <?php echo image_tag('stylistica-icons/24x24/id_card.png',array('id'=>'btn-pan-empresa')) ?>
            <?php include 'pan-empresa.php'; ?>
        </div>
    </div>
    <div class="span-2 last" id="dash">
        <div class="span-2 last"><a href="<?php echo url_for('@homepage') ?>"><?php echo image_tag('stylistica-icons/24x24/home.png') ?></a></div>
        <div class="span-2 last"><?php echo image_tag('stylistica-icons/24x24/user.png') ?></div>
        <div class="span-2 last"><a href="<?php echo url_for("@editarUsuario?nombre_usuario=" . $sf_user->getAttribute('usuario_username', '', 'user_vars')) ?>"><?php echo image_tag('stylistica-icons/24x24/process.png') ?></a></div>
        <div class="span-2 last"><?php echo image_tag('stylistica-icons/24x24/comments.png') ?></div>
        <div class="span-2 last" style=" padding-bottom: 20px;"><a href="<?php echo url_for('@logout') ?>"><?php echo image_tag('stylistica-icons/24x24/shut_down.png') ?></a></div>
        <div class="span-2 last" id="end-dash"></div>
    </div>
    <div class="span-9" id="reg-empresa">
        <span id="reg-empresa-image"><?php echo image_tag('stylistica-icons/24x24/right_arrow.png') ?></span>
        <span id="reg-empresa-text">¿Tienes una empresa? ¿Quieres registrarte? <a href="<?php echo url_for('@comercio') ?>">¡Clic aquí!</a></span></div>
</div>