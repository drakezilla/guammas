<?php use_stylesheet('main-layout.css') ?>
<h1>Gracias por inscribirte!</h1>
<p>
    Ya estas listo para comenzar a promocionar tus ofertas!
</p>
<p>
    En unos momentos seras redireccionado, por favor espera...
</p>
<script>
    setTimeout(function(){
        location.href='<?php echo url_for("empresa/activarComercioUsuario") ?>'
    },5000)
</script>