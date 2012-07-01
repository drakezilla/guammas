<?php use_stylesheets_for_form($formOrganizacion) ?>
<?php use_javascripts_for_form($formOrganizacion) ?>
<?php use_javascript("jquery-plugins/jquery_maskedInput.js") ?>
<?php use_javascript("jquery-plugins/jquery_chosen.js") ?>
<?php use_stylesheet("jquery-plugins/jquery_chosen.css") ?>
<?php use_stylesheet("modules/empresa/empresa_new.css") ?>
<?php use_javascript("http://maps.google.com/maps/api/js?sensor=true&language=es") ?>
<?php use_javascript('custom/googlemaps_api.js', 'last') ?>
<?php include_partial("assets") ?>
<?php include_partial('form', array('formOrganizacion' => $formOrganizacion, 'formUbicacion' => $formUbicacion)) ?>