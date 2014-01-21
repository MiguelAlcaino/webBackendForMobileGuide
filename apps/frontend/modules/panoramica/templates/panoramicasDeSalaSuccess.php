<?php $columnas = 4?>
<h1>Panoramicas de la sala <?php echo $sala->getNombre()?></h1>

<table id="tabla_de_salas">
<tbody>
  <?php $contador=0?>
  
  <?php foreach($panoramicas as $panoramica):?>
    <?php if($contador%$columnas == 0):?>
      <tr>
    <?php endif?>
      
      <td>
        <div id="sala">
          <span id="sala_titulo" ><?php echo $panoramica->getNumeroOrden()?><br /><?php echo $panoramica->getDescripcion()?></span>
          <br />
            <?php echo image_tag(public_path('uploads/imagenes/',true).$panoramica->getRutaImagen(), 'size=150x78')?>
          
          <table>
            <tr class="sala_submenu" bgcolor="<?php echo $panoramica->getEstado() ? 'green' : 'red'?>">
              <td>
                <div class="sala_opcion">Estado:</div>
                <div class="sala_iconos">
                  <?php echo $panoramica->getEstado() ? image_tag('ok', 'title=Panoramica activada. Ser&aacute; visible en la gu&iacute;a.'): image_tag('cancel','title=Panoramica desactivada. No ser&aacute; visible en la gu&iacute;a.')?>
                </div>
              </td>
            </tr>
            <tr class="sala_submenu">
              <td>
                <div class="sala_opcion">Opciones</div>
                <div class="sala_iconos"><?php echo link_to(image_tag('edit','title=Editar imagen panoramica'), 'panoramica/edit?id='.$panoramica->getId())?> <?php echo link_to(image_tag('delete','title=Eliminar esta imagen panoramica'), 'panoramica/delete?id='.$panoramica->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar la panoramica?\nTenga en cuenta que al eliminarla se eliminar\u00e1n todas las exposiciones puestas en ella.\nPrefiera editar.')) ?></div>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <?php $contador++?>
    <?php if($contador%$columnas == 0):?>
      </tr>
    <?php endif?>
    
  <?php endforeach?>
  
</tbody>
</table>
<table class="opciones_abajo">
  <tr>
    <td>
      <?php echo link_to(image_tag('add').' '.'Agregar panoramica a la sala', 'panoramica/new?id_sala='.$sala->getId(), array('class' => 'boton'))?>
    </td>
  </tr>
</table>
