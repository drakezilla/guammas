<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>        
        <div class="container" id="main-wrapper">
            <div id="main-content">
                <?php echo $sf_content ?>
            </div>
            <div class="span-4 last" id="lay-header-logo"></div>
            <div id="lay-panel">
                <?php echo image_tag('stylistica-icons/24x24/search.png', array('id' => 'btn-pan-buscar')) ?>
                <?php echo image_tag('stylistica-icons/24x24/id_card.png', array('id' => 'btn-pan-empresa')) ?>
                <?php include 'pan-empresa.php'; ?>
            </div>
            <div class="span-2 last" id="dash">
                <div class="span-2 last"><a href="<?php echo url_for('@homepage') ?>"><?php echo image_tag('stylistica-icons/24x24/home.png') ?></a></div>
                <div class="span-2 last"><?php echo image_tag('stylistica-icons/24x24/user.png') ?></div>
                <div class="span-2 last"><a href="<?php echo url_for("@editarUsuario?nombre_usuario=" . $sf_user->getAttribute('usuario_username', '', 'user_vars')) ?>"><?php echo image_tag('stylistica-icons/24x24/process.png') ?></a></div>
                <div class="span-2 last"><?php echo image_tag('stylistica-icons/24x24/comments.png') ?></div>
                <div class="span-2 last"><a href="<?php echo url_for('@logout') ?>"><?php echo image_tag('stylistica-icons/24x24/shut_down.png') ?></a></div>
                <div class="span-2 last" id="end-dash"></div>
            </div>
            <div id="lay-footer"></div>
        </div>
        <div id="main-login-form"></div>
    </body>
</html>
