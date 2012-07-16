<form action="<?php echo url_for('@busqueda') ?>" method="get">
    <div id="pan-buscar">
        <input type="text" placeholder="Busca empresas, productos o algo que quieras o necesites" name="s" />
        <button type="submit">Busca!</button>
    </div>
</form>
<?php
$boolEmpresas = false;
if ($sf_user->hasCredential("Empresa")) {
    $empresas = $sf_user->getAttribute("organizacion", '', 'org_vars');
    $boolEmpresas = true;
}
?>
<div id="pan-empresa">
    <p>Hola <strong><?php echo $sf_user->getAttribute("usuario_username", '', "user_vars") ?></strong>, ¿qué quieres hacer?</p>
    <?php if ($boolEmpresas): ?>
        <?php for ($i = 0; $i < count($empresas); $i++) : ?>
            <div><a href='/empresa_dev.php/cpanel/<?php echo $empresas[$i]['organizacion_token'] ?>'>Administrar <?php echo $empresas[$i]['organizacion_nombre'] ?></a></div>
        <?php endfor; ?>
    <?php endif; ?>
</div>