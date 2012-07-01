<?php use_stylesheet('main-layout.css') ?>
<?php use_stylesheet("custom/customtabs.css") ?>
<?php use_stylesheet("modules/usuario/usuario_edit.css") ?>
<?php include_partial("assets_editar_usuario") ?>
<?php include_partial("flashes") ?>
<?php include_partial('form_perfil', array('formUsuario' => $formUsuario)) ?>