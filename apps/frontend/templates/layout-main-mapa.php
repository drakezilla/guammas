<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all" />
    </head>
    <body>        
        <div class="container" id="main-container">
            <?php echo $sf_content ?>
            <?php include ('gui.php') ?>
        </div>

        <div id="lay-footer"></div>
        <div id="main-login-form"></div>
    </body>
</html>
