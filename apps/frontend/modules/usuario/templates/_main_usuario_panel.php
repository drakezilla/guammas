<?php
$boolEmpresas = false;
if ($sf_user->hasCredential("Empresa")) {
    $empresas = $sf_user->getAttribute("empresa", '', 'empr_vars');
    $boolEmpresas = true;
}
?>
<div id="mup-header"><p>Hola <strong><?php echo $sf_user->getAttribute("usuario_username", '', "user_vars") ?></strong>, ¿qué quieres hacer?</p></div>
<div><a href='<?php echo url_for("@editarUsuario?nombre_usuario=" . $sf_user->getAttribute("usuario_username", '', "user_vars")) ?>'>Configuración</a></div>
<?php if ($boolEmpresas): ?>
    <?php for ($i = 0; $i < count($empresas); $i++) : ?>
        <div><a href='/empresa_dev.php/cpanel/<?php echo $empresas[$i]['empresa_token'] ?>'>Administrar <?php echo $empresas[$i]['empresa_nombre'] ?></a></div>
    <?php endfor; ?>
<?php endif; ?>
<div><a href='<?php echo url_for("usuario/cerrarsesion") ?>'>Cerrar sesión</a></div>
