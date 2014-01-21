<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script language="JavaScript">
function point_it(event){
	pos_x = event.offsetX?(event.offsetX):event.pageX-document.getElementById("pointer_div").offsetLeft;
	pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("pointer_div").offsetTop;
	document.getElementById("cross").style.left = parseInt(pos_x-1) + "px";
	document.getElementById("cross").style.top = parseInt(pos_y-15) + "px";
	document.getElementById("cross").style.visibility = "visible" ;
	//document.pointform.form_x.value = pos_x;
	//document.pointform.form_y.value = pos_y;
  document.getElementById("sala_cord_x").value = pos_x;
  document.getElementById("sala_cord_y").value = pos_y;
}

</script>
<script language="javascript">
function cambiarPiso(piso){
  
  switch(piso){
    <?php foreach($pisos as $piso):?>
      case <?php echo $piso->getNumeroPiso()?>:
      document.getElementById("pointer_div").style.backgroundImage = "url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $piso->getRutaImagen()?>')";
      document.getElementById("sala_id_piso").value = piso;
      break;
    <?php endforeach;?>
  }
}
</script>
<script language="javascript" src="/js/audio-player.js"></script>
<script language="javascript">
  AudioPlayer.setup("<?php echo public_path('swf/player.swf')?>",{ width: 200});
</script>

<form action="<?php echo url_for('sala/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  
      <div class="perspectiva">
        <div class="persectiva_seleccion">
          <?php foreach($pisos as $piso):?>
            <a onclick="cambiarPiso(<?php echo $piso->getNumeroPiso()?>)" href="#">Piso <?php echo $piso->getNumeroPiso()?> </a>&nbsp;
          <?php endforeach;?>
        </div>
        <div id="pointer_div" onclick="point_it(event)" 
          style =
          "<?php if($form->getObject()->isNew()):?>
          background-image:url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $pisos[0]->getRutaImagen()?>');
          <?php else:?>background-image:url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $form->getObject()->getPiso()->getRutaImagen()?>');<?php endif?>width:800px;height:480px;">
            <img src="<?php echo public_path('uploads/imagenes/',true)?>point.gif" id="cross" style="<?php if($form->getObject()->isNew()):?>position:relative;visibility:hidden;<?php else: ?>position:relative;visibility:visible;left:<?php echo $sala->getCordX()-1?>px;top:<?php echo $sala->getCordY()-15?>px;<?php endif?>" />
        </div>
      </div>
  <fieldset>
  <legend>Datos de la sala</legend>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
          <?php echo $form['nombre']->renderHelp()?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sala_numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['sala_numero']->renderError() ?>
          <?php echo $form['sala_numero'] ?>
          <?php echo $form['sala_numero']->renderHelp()?>
        </td>
      </tr>
      <?php if(count($form->getObject()->getPanoramica()) != 0):?>
      <tr>
        <th><?php echo $form['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado']->renderError() ?>
          <?php echo $form['estado'] ?>
          <?php echo $form['estado']->renderHelp()?>
        </td>
      </tr>
      <?php endif?>
      
    </tbody>
  </table>
  </fieldset>
  <fieldset>
    <legend>Sonido del recorrido</legend>
    <table>
      <tbody>
        <tr>
          <th><?php echo $form['sala_grabacion_recorrido']['ruta_sonido']->renderLabel()?></th>
          <td><?php echo $form['sala_grabacion_recorrido']['ruta_sonido']?><?php echo $form['sala_grabacion_recorrido']['ruta_sonido']->renderHelp()?></td>
          <td>
          <?php $grabacion_recorrido = $form->getObject()->getGrabacionRecorrido()?>
          <?php if($grabacion_recorrido[0]->getRutaSonido()):?>
          <p id="audioplayer_1">Alternative content</p>
              <script type="text/javascript">  
        AudioPlayer.embed("audioplayer_1", 
        {
          soundFile: "<?php echo sfConfig::get('app_ruta_sonidos').$grabacion_recorrido[0]->getRutaSonido()?>",
          titles: "<?php echo $form->getObject()->getNombre()?>",
          artists: "Recorrido"
        });  
        </script>
        <?php endif?>
        </td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <table class="opciones_abajo">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="boton" href="<?php echo url_for('sala/index?numero_piso=1') ?>"><?php echo image_tag('reset')?>&nbsp;Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('delete').' '.'Eliminar', 'sala/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'boton')) ?>
          <?php endif; ?>
          <button type="submit"><?php echo image_tag('ok')?>&nbsp;Guardar</button>
        </td>
      </tr>
    </table>
          
          <input id="sala_id_piso" type="hidden" name="sala[id_piso]" />
          <input id="sala_cord_x" type="hidden" name="sala[cord_x]" />
          <input id="sala_cord_y" type="hidden" name="sala[cord_y]" />
          <script language="javascript">
          <?php if(!$form->getObject()->isNew()):?>
            document.getElementById("sala_id_piso").value = <?php echo $form->getObject()->getIdPiso()?>;
            document.getElementById("sala_cord_x").value = <?php echo $form->getObject()->getCordX()?>;
            document.getElementById("sala_cord_y").value = <?php echo $form->getObject()->getCordY()?>;
          <?php else:?>
            document.getElementById("sala_id_piso").value = <?php echo $pisos[0]->getNumeroPiso()?>;
          <?php endif?>
          </script>
</form>
