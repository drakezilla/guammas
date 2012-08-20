<style>
    html {font-size:100.01%;}
    body {font-size:75%;color:#222;background:#fff;font-family:"Helvetica Neue", Arial, Helvetica, sans-serif;}
    h3{font-weight:normal;color:#111;}
    h3 {font-size:1.5em;line-height:1;margin-bottom:1em;}
    .container {width:950px;margin:0 auto;}
    #main-wrapper{min-height: 100%; border-left:  #10b3ea solid 5px; border-right: #10b3ea solid 5px; }
</style>
<div class="container" id="main-wrapper">
    <div class="span-24 last" id="lay-header">
        <div class="span-4 last" id="lay-header-logo"><?php echo image_tag('layout/lay-logo.png') ?></div>
    </div>
    <div id="main-content">
        <?php echo $sf_content ?>
    </div>
    <div id="lay-footer">
        <?php echo image_tag('layout/lay-footer.png') ?>
    </div>
</div>