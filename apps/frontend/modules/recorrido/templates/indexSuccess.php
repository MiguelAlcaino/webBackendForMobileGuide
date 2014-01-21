<script language="javascript">
$(document).ready(function(){
  $('.td_recorrido_detalle').hide();
  $('.toggle_detalle').click(function(){
    var id = $(this).attr('id');
    var td_detalle = '#detalle_'+id;
    $(td_detalle).toggle();
  });
});

</script>
<?php if(isset($recorridos_desactivados)):?>
  <div class="flash_notice">
    <?php echo image_tag('error')?>El/los siguientes recorridos estan desactivados: 
      <?php foreach($recorridos_desactivados as $rd):?>
        <strong><?php echo $rd->getTipo()?></strong>
      <?php endforeach?>
    
  </div>
<?php endif?>
<h1>Recorridos del Museo</h1>

<table id="tabla_de_recorridos">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Cantidad de salas</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($recorridos as $recorrido): ?>
    <tr>
      <td class="td_recorrido_nombre"><?php echo $recorrido->getTipo() ?></td>  
      <td class="td_recorrido_cantidad"><?php echo count($recorrido->getDetalleRecorrido())?></td>    
      <td class="td_recorrido_opciones">
        <?php echo link_to(image_tag('edit'), 'recorrido/edit?id='.$recorrido->getId())?>
        <?php echo image_tag('detalle', 'title=Ver salas del recorrido class=toggle_detalle id='.$recorrido->getId())?>
        <?php echo link_to(image_tag('delete', 'title=Eliminar este recorrido'), 'recorrido/delete?id='.$recorrido->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar este recorrido?')) ?>
        <div class="exposicion_estado" style="background-color: <?php echo $recorrido->getEstado() ? 'green' : 'red'?>;">
          <?php if($recorrido->getEstado()):?>
                  <?php echo image_tag('ok','title=La sala esta activada. Ser&aacute; visible en la gu&iacute;a.')?>
                <?php else:?>
                  <?php echo image_tag('cancel', 'title=La sala esta desactivada. No ser&aacute; visible en la gu&iacute;a.')?>
                <?php endif?>
        </div>
      </td>
    </tr>
    <tr class="td_recorrido_detalle" id="detalle_<?php echo $recorrido->getId()?>">
      <td colspan="3" >
        <?php if(count($recorrido->getDetalleRecorrido())== 0):?>
          <span style="font-weight: bold; font-style: italic;">Este recorrido a&uacute;n no tiene salas. Ed&iacute;telo para que cuente con ellas.</span>
        <?php else:?>
          <?php foreach ($recorrido->getDetalleRecorrido() as $detalle_recorrido):?>
            <?php echo image_tag(public_path('uploads/imagenes/',true).$detalle_recorrido->getSala()->getRutaImagen(), 'size=150x78')?>
          <?php endforeach;?>
        <?php endif?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br />
<table class="opciones_abajo">
  <tr>
    <td><a href="<?php echo url_for('recorrido/new') ?>" class="boton"><?php echo image_tag('add')?>&nbsp;Agregar nuevo recorrido</a></td>
  </tr>
</table>
  
