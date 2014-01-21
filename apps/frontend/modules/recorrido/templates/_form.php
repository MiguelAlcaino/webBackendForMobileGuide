<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script language="JavaScript" src="/js/prototype.js"></script>
<script language="JavaScript" src="/js/scriptaculous.js"></script>


<form action="<?php echo url_for('recorrido/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <fieldset>
  <legend>Datos del recorrido</legend>
  <table>
    <tbody>
      <tr>
        <th><?php echo $form['tipo']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo']->renderError() ?>
          <?php echo $form['tipo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado']->renderError() ?>
          <?php echo $form['estado'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  </fieldset>
  <fieldset>
    <legend>Orden del recorrido</legend>
    <table id="contenedor_orden">
    <tr>
      <td>
        <strong style="font-size: medium;">Salas del Museo</strong>
        <br />
        <strong style="font-size: smaller; font-style: italic; font-weight: bold;">(*) Estas son las salas que estan activadas y que tienen una naraci&oacute;n asociada.</strong>
      </td>
      <td></td>
      <td align="right">
        <strong style="font-size: medium;">Salas del Recorrido</strong>
      </td>
    </tr>
    <tr>
    
    <td id="td_salas_museo">
      
      <ul id="salas_museo">
          <?php foreach($salas as $sala):?>
            <li id="salas_museo_<?php echo $sala->getId()?>">
              <div class="contenedor_sala_de_recorrido" style="background-color: <?php echo $sala->getEstado() ? 'green' : 'red'?>;">
              <?php echo $sala->getNombre()?>
                <?php echo image_tag('headphones')?>
                <br />
              <?php $panoramicas = $sala->getPanoramica()?>
              <?php echo image_tag(public_path('uploads/imagenes/',true).$panoramicas[0]->getRutaImagen(),'size=150x78')?>
              </div>
            </li>
          <?php endforeach?>
      </ul>
      </td>
      
      <td>
        <div id="instrucciones_recorrido">
          <?php echo $form['detalle_recorrido']->renderError()?>
          <br />
          Mueva hacia la derecha las salas que quiera que esten en el recorrido.
          <br />
          <br />
          Mueva hacia la izquierda las salas que quiera sacar del recorrido.
          <br />
          
        </div>
        
        
      </td>
      
      <td id="td_salas_recorrido">
      <ul id="salas_recorrido">
        <?php if($form->getObject()->isNew()):?>
          
        <?php else:?>
          <?php foreach($form->getObject()->getDetallesRecorridos() as $detalle_recorrido):?>
            <?php $panoramicas = $detalle_recorrido->getSala()->getPanoramica() ?>
              <li value="<?php echo $detalle_recorrido->getSala()->getEstado() ? '1' : '0'?>" id="salas_museo_<?php echo $detalle_recorrido->getSala()->getId()?>" class="salas_orden">
                <div class="contenedor_sala_de_recorrido" style="background-color: <?php echo $detalle_recorrido->getSala()->getEstado() ? 'green' : 'red'?>;">
                <?php echo $detalle_recorrido->getSala()->getNombre()?>
                <?php echo image_tag('headphones')?>
                <br />
                <?php echo image_tag(public_path('uploads/imagenes/',true).$panoramicas[0]->getRutaImagen(), 'size=150x78')?>
                </div>
              </li>
          <?php endforeach?>
        <?php endif?>
      </ul>
      </td>
    </tr>
    </table>
  </fieldset>
  <table class="opciones_abajo">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="boton" href="<?php echo url_for('recorrido/index') ?>"><?php echo image_tag('reset')?>&nbsp;Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('delete').' '.'Eliminar', 'recorrido/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar este recorrido?', 'class' => 'boton')) ?>
          <?php endif; ?>
          <button type="submit"><?php echo image_tag('ok')?>&nbsp;Guardar</button>
        </td>
      </tr>
    </table>
</form>
<script language="javascript">
  Sortable.create("salas_museo",
     {dropOnEmpty:true,containment:["salas_museo","salas_recorrido"],constraint:false});
  Sortable.create("salas_recorrido",
     {dropOnEmpty:true,containment:["salas_museo","salas_recorrido"],constraint:false,
     onChange:function(){
      $('recorrido_detalle_recorrido').value = Sortable.serialize('salas_recorrido');
      }});
     <?php if(!$form->getObject()->isNew()):?>
     $('recorrido_detalle_recorrido').value = Sortable.serialize('salas_recorrido');
     <?php endif?>
</script>