<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <script>
        setTimeout(function(){
            $(".notice").hide('fast');
        },5000)
    </script>
<?php endif; ?>
<?php if ($sf_user->hasFlash('error')): ?>
    <script>
        setTimeout(function(){
            $(".error").hide('fast');
        },5000)
    </script>
    <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>