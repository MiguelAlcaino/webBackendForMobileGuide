<?php $columnas = 4?>

<h1>Piso 
<?php foreach($pisos as $piso):?>
  <?php echo link_to($piso->getNumeroPiso(), 'sala/index?numero_piso='.$piso->getNumeroPiso())?>
<?php endforeach?>
</h1>

<table id="tabla_de_salas">
<tbody>
  <?php $contador=0?>
  
  <?php foreach($salas as $sala):?>
    <?php if($contador%$columnas == 0):?>
      <tr>
    <?php endif?>
      <?php $panoramicas = $sala->getPanoramica()?>
      <td>
        <div id="sala">
          <span id="sala_titulo" ><?php echo $sala->getNombre()?></span>
          <br />
          <?php if($panoramicas[0]->getRutaImagen()):?>
            <?php echo image_tag(public_path('uploads/imagenes/',true).$panoramicas[0]->getRutaImagen(), 'size=150x78')?>
          <?php else:?>
            <?php echo image_tag(public_path('uploads/imagenes/',true).'sin_panoramica.jpg', 'size=150x78')?>
          <?php endif?>
          <table>
          <tr class="sala_submenu" bgcolor="<?php echo $sala->getEstado() ? 'green': 'red'?>">
            <td>
              <div class="sala_opcion">Estado: </div>
              <div class="sala_iconos">
              <?php $grabacion_recorrido = $sala->getGrabacionRecorrido()?>
                <?php if($grabacion_recorrido[0]->getRutaSonido()):?>
                  <?php echo image_tag('headphones', 'title=Esta sala cuenta con una narraci&oacute;n para el recorrido')?>
                <?php endif?>
                <?php if($sala->getEstado()):?>
                  <?php echo image_tag('ok','title=La sala esta activada. Ser&aacute; visible en la gu&iacute;a.')?>
                <?php else:?>
                  <?php echo image_tag('cancel', 'title=La sala esta desactivada. No ser&aacute; visible en la gu&iacute;a.')?>
                <?php endif?>
              </div>
            </td>
          </tr>
          <tr class="sala_submenu">
            <td>
              <div class="sala_opcion">Sala: </div>
              <div class="sala_iconos">
                <?php echo link_to(image_tag('edit','title=Editar esta sala'), 'sala/edit?id='.$sala->getId())?>
                <?php echo link_to(image_tag('delete', 'title=Eliminar esta sala del piso'), 'sala/delete?id='.$sala->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer borrar la sala?')) ?>
              </div>
            </td>
          </tr>
          <tr class="sala_submenu"><td><div class="sala_opcion">Panoramicas (<strong><?php echo $sala->getNumeroPanoramicas()?></strong>):</div> <div class="sala_iconos"><?php echo link_to(image_tag('add','title= A&ntilde;adir una nueva panoramica a la sala'), 'panoramica/new?id_sala='.$sala->getId())?> <?php echo link_to(image_tag('list','title=Lista de panoramicas de la sala'), 'panoramica/panoramicasDeSala?id_sala='.$sala->getId())?></div></td></tr>
          
          <tr class="sala_submenu">
            <td>
              <div class="sala_opcion">Exposiciones:</div>
              <div class="sala_iconos">
                <?php if(count($sala->getPanoramica()) > 0):?>
                  <?php echo link_to(image_tag('add','title=A&ntilde;adir una exposici&oacute;n a la sala'), 'exposicion/new?id_sala='.$sala->getId())?>
                  <?php echo link_to(image_tag('list', 'title= Lista de exposiciones de la sala'), 'exposicion/exposicionesDeSala?id_sala='.$sala->getId())?>
                <?php endif?>
                
              </div>
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
    <td><a class="boton" href="<?php echo url_for('sala/new') ?>"><?php echo image_tag('add')?>&nbsp;Agregar nueva sala</a></td>
  </tr>
</table>
  
