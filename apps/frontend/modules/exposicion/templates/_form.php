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
  document.getElementById("exposicion_cord_x").value = pos_x;
  document.getElementById("exposicion_cord_y").value = pos_y;
}

</script>
<script language="javascript">
  $(document).ready(function() {
    $('#load').hide();
  });


  $(function() {
              $(".borrar_imagen").click(function() {
                $('#load').fadeIn();
                var commentContainer = $(this).parent().parent();
                var id = $(this).attr("id");
                var string = 'id_exposicion_imagen='+ id ;
              	
                $.ajax({
                   type: "POST",
                   url: "<?php echo url_for('exposicion/borrarImagenDeExposicion')?>",
                   data: string,
                   cache: false,
                   success: function(){
                	commentContainer.slideUp('slow', function() {$(this).remove();});
                	$('#load').fadeOut();
                  }
                   
                 });
                
                return false;
                	});
              });
</script>

<script language="javascript" src="/js/audio-player.js"></script>
<script language="javascript">
  AudioPlayer.setup("<?php echo public_path('swf/player.swf')?>",{ width: 200});
</script>


<script language="javascript">
function cambiarPanoramica(id_panoramica){
  
  switch(id_panoramica){
    <?php foreach($panoramicas as $panoramica):?>
      case <?php echo $panoramica->getId()?>:
      document.getElementById("pointer_div").style.backgroundImage = "url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $panoramica->getRutaImagen()?>')";
      document.getElementById("exposicion_id_panoramica").value = id_panoramica;
      break;
    <?php endforeach;?>
  }
}
</script>

<form action="<?php echo url_for('exposicion/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  
  
  <div class="perspectiva">
    <div class="persectiva_seleccion">
      <?php foreach($panoramicas as $panoramica):?>
            <a onclick="cambiarPanoramica(<?php echo $panoramica->getId()?>)" href="#"><?php echo $panoramica?> </a>&nbsp;
      <?php endforeach;?>
    </div>
    <div id="pointer_div" onclick="point_it(event)" 
          style =
          "<?php if($form->getObject()->isNew()):?>
          background-image:url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $panoramicas[0]->getRutaImagen()?>');
          <?php else:?>background-image:url('<?php echo public_path('uploads/imagenes/',true)?><?php echo $form->getObject()->getPanoramica()->getRutaImagen()?>');<?php endif?>width:800px;height:415px;">
            <img src="http://localhost/point.gif" id="cross" style="<?php if($form->getObject()->isNew()):?>position:relative;visibility:visible;left:<?php echo $form['cord_x']->getValue()-1?>px;top:<?php echo $form['cord_y']->getValue()-15?>px;<?php else: ?>position:relative;visibility:visible;left:<?php echo $form->getObject()->getCordX()-1?>px;top:<?php echo $form->getObject()->getCordY()-15?>px;<?php endif?>" />
    </div>
    <div align="center"><?php echo $form['cord_x']->renderError()?></div>
  </div>
  <fieldset>
  <legend>Datos de la exposici&oacute;n</legend>
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>  
      <tr>
        <th><?php echo $form['codigo']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigo']->renderError() ?>
          <?php echo $form['codigo'] ?>
          <?php echo $form['codigo']->renderHelp()?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
          <?php echo $form['nombre']->renderHelp()?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
          <?php echo $form['descripcion']->renderHelp()?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado']->renderError() ?>
          <?php echo $form['estado'] ?>
          <?php echo $form['estado']->renderHelp()?>
        </td>
      </tr>
    </tbody>
  </table>
  </fieldset>
  
  <fieldset>
  <legend>Imagenes de la exposici&oacute;n</legend>
  <table>
    <thead>
    <tr>
      
      <th>Seleccione imagen <div style="float: left;" id="load"><?php echo image_tag('loading.gif')?></div></th>
      <th>Principal</th>
      <th>Ver imagen</th>
      <th>Borrar</th>
    </tr>
    </thead>
    <tbody id="contenedor_imagenes">
    <?php $counter = 0?>
    <?php if($form->getObject()->isNew()):?>
      <?php $exposicion_imagen_form = $form['exposicion_imagen_form']?>
    <?php else:?>
      
    <?php endif?>
    <?php foreach($form['exposicion_imagen_form'] as $exposicion_imagen):?>
      <?php $counter++?>
      <tr id="imagen_<?php echo $counter?>">
        <td><?php echo $exposicion_imagen['ruta_imagen']?><?php echo $exposicion_imagen['ruta_imagen']->renderError() ?></td>
        <td><?php echo $exposicion_imagen['principal']?></td>
        <td>
          
          <a href="<?php echo public_path('uploads/imagenes/',true)?><?php echo $exposicion_imagen['ruta_imagen']->getValue()?>" id="imagen_exposicion_<?php echo $exposicion_imagen['id']->getValue()?>">Ver imagen</a>
          <script>
            $(document).ready(function() {
                $("#imagen_exposicion_<?php echo $exposicion_imagen['id']->getValue()?>").fancybox();
              });
          </script>
        </td>
        <td><a href="#" id="<?php echo $exposicion_imagen['id']->getValue()?>" class="borrar_imagen"><?php echo image_tag('delete', 'title= Eliminar imagen')?></a></td>
      </tr>
      
    <?php endforeach?>
    </tbody>
    <tfoot>
      <tr>
        
        <td colspan="4" align="right"><button type="button" id="add_imagen"><?php echo image_tag('add')?>&nbsp;Agregar Imagen</button></td>
      </tr>
    </tfoot>
  </table>
  <div class="ayuda_form">(!) Tenga en cuenta que al presionar el &iacute;cono <?php echo image_tag('delete')?> la imagen ser&aacute; eliminada de manera permanente.</div>
  </fieldset>
  
  <fieldset>
  <legend>Sonido de la exposici&oacute;n</legend>
    <table>
      <tbody>
        
          <tr>
            <th><?php echo $form['exposicion_sonido_form']['ruta_sonido']->renderLabel()?></th>
            <td>
              <?php echo $form['exposicion_sonido_form']['ruta_sonido']->renderError()?>
              <?php echo $form['exposicion_sonido_form']['ruta_sonido']?>
              <?php echo $form['exposicion_sonido_form']['ruta_sonido']->renderHelp()?>
            </td>
            <?php 
            $expo_sonidos = $form->getObject()->getExposicionSonido();
             if($expo_sonidos[0]->getRutaSonido()):?>
              <td><p id="audioplayer_1">Alternative content</p>
              <script type="text/javascript">  
        AudioPlayer.embed("audioplayer_1", 
        {
          soundFile: "<?php echo public_path('uploads/sonidos/').$expo_sonidos[0]->getRutaSonido()?>",
          titles: "<?php echo $form->getObject()->getNombre()?>",
          artists: "Museo Naval"
        });  
        </script> </td>
               
            <?php endif?>
          </tr>
        
      </tbody>
    </table>
  </fieldset>
  
  <table class="opciones_abajo">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="boton" href="<?php echo url_for('exposicion/exposicionesDeSala?id_sala='.$panoramicas[0]->getSala()->getId()) ?>"><?php echo image_tag('reset')?>&nbsp;Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('delete').' '.'Eliminar', 'exposicion/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer elimnar esta exposicion?', 'class' => 'boton')) ?>
          <?php endif; ?>
          <button type="submit"><?php echo image_tag('ok')?>&nbsp;Guardar</button>
        </td>
      </tr>
    </table>
    
          <?php echo $form['id_panoramica']->renderError() ?>
          <input id="exposicion_id_panoramica" type="hidden" name="exposicion[id_panoramica]" />
          <?php //echo $form['id_panoramica'] ?>
          
          <input id="exposicion_cord_x" type="hidden" name="exposicion[cord_x]" />
          <input id="exposicion_cord_y" type="hidden" name="exposicion[cord_y]" />
          <script language="javascript">
          <?php if(!$form->getObject()->isNew()):?>
              document.getElementById("exposicion_id_panoramica").value = <?php echo $form->getObject()->getIdPanoramica()?>;
              document.getElementById("exposicion_cord_x").value = <?php echo $form->getObject()->getCordX()?>;
              document.getElementById("exposicion_cord_y").value = <?php echo $form->getObject()->getCordY()?>;
            <?php else:?>
              document.getElementById("exposicion_id_panoramica").value = <?php echo $panoramicas[0]->getId()?>;
          <?php endif?>
          </script>
          
          <script language="javascript">
            var cnt = <?php echo $counter ?>;
            function addExposicionImagen(num)
            {
              $('#load').fadeIn();
              var r = jQuery.ajax({
                type: 'GET',
                url: '<?php  echo url_for('exposicion/addExposicionImagenForm')?>'+'<?php echo ($form->getObject()->isNew()?'':'?id_exposicion='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=') ?>'+num ,
                async: false
              }).responseText;
              $('#load').fadeOut();
              return r;
            };
            jQuery().ready(function()
            {
              jQuery('button#add_imagen').click(function() {
                jQuery("#contenedor_imagenes").append(addExposicionImagen(cnt));
                cnt = cnt + 1;
              });
            });
            
            function borrarExposicionImagen(num){
              document.getElementById('contenedor_imagenes').removeChild(document.getElementById('imagen_'+num));
              cnt = cnt - 1;
            };
            
            $(function(){
              $(".borrar_imagen_anadida").click(function(){
                var commentContainer = $(this).parent().parent();
                commentContainer.slideUp('slow');
                cnt= cnt - 1;
              })
            });
          </script>
          
</form>
