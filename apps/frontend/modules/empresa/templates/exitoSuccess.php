<?php use_stylesheet('main-layout.css') ?>
<?php use_stylesheet('jquery-plugins/jquery_tagedit.css') ?>
<?php use_javascript('jquery-plugins/jquery_tagedit.js') ?>
<?php use_javascript('jquery-plugins/jquery_tagit_autoGrowInput.js') ?>
<script>
    $(document).ready(function(){
        $("#etiquetas").tagedit({
            autocompleteURL: '<?php echo url_for('empresa/tags') ?>',
            allowAdd: true
        });
        $("#btn-guardar").click(function(){
            var j=0
            var miArray = new Array;
            var tagArray = new Array;
            var btn_salir='<button onclick="location.href=\'<?php echo url_for('@homepage') ?>\'" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false">'
                           +'<span class="ui-button-text">Vamonos!</span>'
                           +'</button>';
            
            $("#tags ul input").each(function(ind, ele){
                miArray[j] = $(ele).val();
                j++;
            })
            for(i=0;i<miArray.length-1;i++){
                tagArray[i]=miArray[i];
            }
            $.ajax({
                url: '<?php echo url_for('empresa/guardarTags') ?>',
                type: 'POST',
                data:{
                    tags: tagArray
                },
                success: function(data){
                    $("#btn-guardar").fadeOut('slow');
                    $("#btn-guardar").remove();
                    setTimeout(function(){
                        $("#span-btn").html("Gracias! ya podemos comenzar "+btn_salir)
                    },4001)
                }
            })
        })
    })
</script>
<h1>Gracias por inscribirte!</h1>
<p>
    Ya estas listo para comenzar a promocionar tus ofertas!
</p>
<p><strong>Antes de que te vayas,</strong> ¿porqué no aprovechas y nos dices que haces?</p>
<p>Tus clientes pueden buscarte por eso que haces o vendes</p>
<h5>Escribe lo que haces y vendes separado por una coma</h5>
<p>Asi: Comida, Pasta, Espagueti</p>

<div id="tags">
    <input type="text" id="etiquetas" class="tag" name="etiquetas[19-a]" />
    <span id="span-btn">
        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" role="button" aria-disabled="false" id="btn-guardar">
            <span class="ui-button-text">Listo!</span>
        </button>
    </span>
</div>