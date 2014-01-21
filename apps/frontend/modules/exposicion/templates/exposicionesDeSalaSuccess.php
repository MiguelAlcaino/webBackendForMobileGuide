<h1>Exposiciones de la sala <?php echo $sala->getNombre()?></h1>

<table id="tabla_de_exposiciones">
  <thead>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>C&oacute;digo</th>
      <th>Descripci&oacute;n</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($exposiciones as $exposicion):?>
      <tr>
          <?php $exposicion_imagenes = $exposicion->getExposicionImagen()?>
        <td><?php echo count($exposicion_imagenes) > 0 ? image_tag(public_path('uploads/imagenes/',true).$exposicion_imagenes[0]->getRutaImagen(), 'size=100x100') : image_tag('error')?>
          
        </td>
        <td><?php echo $exposicion->getNombre()?></td>
        <td><?php echo $exposicion->getCodigo()?></td>
        <td><?php echo $exposicion->getDescripcion()?></td>
        <td>
          <div class="exposicion_iconos">
            <?php echo link_to(image_tag('edit','title=Editar exposici&oacute;n'), 'exposicion/edit?id='.$exposicion->getId())?> <?php echo link_to(image_tag('delete','title=Borrar exposici&oacute;n'), 'exposicion/delete?id='.$exposicion->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?><br />  
              <?php if(count($exposicion_imagenes) > 0):?>
                <a id="galeria_<?php echo $exposicion->getId()?>" href="javascript:;"><?php echo image_tag('icono-paisaje.gif', 'title=Ver galeria de imagenes de la exposici&oacute;n')?></a>
              <?php endif?>
            <?php $exposicion_sonido = $exposicion->getExposicionSonido()?>
          </div>        
          <div class="exposicion_estado" style="background-color: <?php echo $exposicion->getEstado() ? 'green' : 'red'?>;">
            <?php if($exposicion_sonido[0]->getRutaSonido()):?>
              <?php echo image_tag('headphones', 'title=Esta exposici&oacute;n cuenta con un audio de narraci&oacute;n.')?>
            <?php endif?>
            <?php echo $exposicion->getEstado() ? image_tag('ok', 'title=Exposici&oacute;n activada. Ser&aacute; visible en la gu&iacute;a.'): image_tag('cancel','title=Exposici&oacute; desactivada. No ser&aacute; visible en la gu&iacute;a.')?>
          </div>
        </td>
        <script language="javascript">
          $("#galeria_<?php echo $exposicion->getId()?>").click(function() {
            $.fancybox([
            <?php foreach($exposicion_imagenes as $imagen):?>
              '<?php echo public_path('uploads/imagenes/',true)?><?php echo $imagen->getRutaImagen()?>',
            <?php endforeach?>
            ], {
            'padding' : 0,
            'transitionIn' : 'none',
            'transitionOut' : 'none',
            'type' : 'image',
            'changeFade' : 0
            });
          }); 
        </script>
      </tr>
    <?php endforeach?>
  </tbody>
</table>
<br />
<table class="opciones_abajo">
  <tr>
    <td><?php echo link_to(image_tag('add').' '.'Agregar exposici&oacute;n a la sala','exposicion/new?id_sala='.$sala->getId(), array('class' => 'boton'))?></td>
  </tr>
</table>
