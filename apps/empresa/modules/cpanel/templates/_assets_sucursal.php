<?php //use_javascript('custom/googlemaps_api.js')          ?>
<script>

    var sucursales;
    $(document).ready(function(){
        $.ajax({
            url: '<?php echo url_for('@getSucursales?token=' . $sf_request->getParameter('token')) ?>',
            dataType: 'json',
            success: function(data){
                sucursales = data;
            }
        })
    });
</script>