<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_javascript('http://maps.google.com/maps/api/js?sensor=true&language=es') ?>
<?php use_javascript('class.js') ?>
<script>
    var html;
//    var mapaEvento = new mapaNuevoEvento();
    $(document).ready(function(){
        $("#pestanas ul li div a").click(function(){
            var tabmostrar=$(this).attr('href');
            $("#pestanas #contenido .tab").slideUp('fast');
            $(tabmostrar).slideDown("fast");
            $("#pestanas ul li div a").css("color","#0066CC")
            $(this).css("color","#E8782E")
            $("#pestanas ul li").removeClass('pestana_click');
            $(this).parent().parent().addClass('pestana_click');
        })
        
        $("#anuncio_tipo_anuncio_id").change(function(){
            switch($(this).val()){
                case '1':        
                    html  = getForm('evento');
                    break;
                case '2': 
                    html  = getForm('oferta');
                    break;
                case '3': 
                    html  = getForm('cupon');
                    break;
                default:
                    alert('error')
                    return false;
                    break;
            }
        })
        
    })
    
    function getForm(ajaxform){
        $.ajax({
            type: 'POST',
            data: {
                form: ajaxform
            },
            url: '<?php echo url_for('@getForm?token='.$sf_request->getParameter('token')) ?>',
            success: function(data){
                $("#anuncio-form-adicional").html(data);
            }
        })
    }
    
</script>
