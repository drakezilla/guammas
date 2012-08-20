<?php use_stylesheet('jquery-plugins/jquery_tagedit.css') ?>
<?php use_javascript('jquery-plugins/jquery_tagedit.js') ?>
<?php use_javascript('jquery-plugins/jquery_tagit_autoGrowInput.js') ?>
<script>
    $(document).ready(function(){
        $("#etiquetas").tagedit({
            autocompleteURL: '<?php echo url_for('empresa/tags') ?>',
            allowAdd: true
        });
    });
    
    $(document).ready(function(){
        $("#btn-guardar").click(function(){
            var j=0
            var miArray = new Array;
            var tagArray = new Array;
            var btn_salir=
                +"<button class='form-btn form-btn-confirmar' type='button' onclick='location.href=\"<?php echo url_for("@homepage") ?>\"'>"
                +"<span>¡Vamonos!</span></button>"
                +'</button>';
            
            $("#tags ul input").each(function(ind, ele){
                miArray[j] = $(ele).val();
                j++;
            })
            for(i=0;i<miArray.length-1;i++){
                tagArray[i]=miArray[i];
            }
        
            $("#form-footer-info").html('<?php echo image_tag('16x16/small_spinner.gif') ?>')
        
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
                        $("#form-footer-info").html("¡Gracias! ya podemos comenzar "+btn_salir)
                    },4001)
                }
            })
        })
    })
</script>