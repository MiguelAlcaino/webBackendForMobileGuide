<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
    <script type="text/javascript" src="/js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" href="/css/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    
    
  </head>
  <body>
  <div id="cabecera">
    <?php echo image_tag('logo')?>    
  </div>
  <ul id="menu">
    <li><?php echo link_to('Pisos', 'piso/index')?></li>
    <li><?php echo link_to('Salas','sala/index')?></li>
    <li><?php echo link_to('Recorridos', 'recorrido/index')?></li>
    <li><?php echo link_to('Ayuda', 'ayuda/index')?></li>
    <?php if($sf_user->getAttribute('id')):?>
      <li><?php echo link_to("Cerrar sesi&oacute;n", 'usuario/logout'); ?></li>
    <?php else:?>
      <li><?php echo link_to("Iniciar sesi&oacute;n", 'usuario/login'); ?></li>
    <?php endif?>
  </ul>
  <div id="contenido">
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php endif ?>
    <?php if ($sf_user->hasFlash('mensaje_recorridos_desactivados')): ?>
      <div class="flash_notice">
        <?php echo $sf_user->getFlash('mensaje_recorridos_desactivados') ?>
        <?php  ?>
      </div>
    <?php endif ?>
    <?php echo $sf_content ?>
  </div>
  </body>
</html>
