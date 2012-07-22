<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div class="container" id="main-wrapper">
            <div class="span-24 last" id="lay-header">
                <div class="span-4 last" id="lay-header-logo"></div>
            </div>
            <div id="main-content">
                <?php echo $sf_content ?>
            </div>
            <div class="span-24" id="lay-info-panel">
                <div class="span-24" id="lay-info-linea"></div>
                <div class="span-24" id="lay-info-naranja">
                    <div class="span-4">&nbsp;</div>
                    <div class="span-4 tres-infos"></div>
                    <div class="span-1">&nbsp;</div>
                    <div class="span-6 tres-infos" id="tres-infos-slide"></div>
                    <div class="span-1">&nbsp;</div>
                    <div class="span-4 tres-infos"></div>
                    <div class="span-4">&nbsp;</div>
                </div>
            </div>
            <div id="lay-footer"></div>
        </div>
        <div id="main-login-form"></div>
    </body>
</html>
