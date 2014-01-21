<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('panoramica/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <fieldset>
  <legend>Datos de la Panoramica</legend>
  <table>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
          <?php echo $form['descripcion']->renderHelp()?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ruta_imagen']->renderLabel() ?></th>
        <td>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo image_tag(public_path('uploads/imagenes/',true).$form->getObject()->getRutaImagen(), 'size=150x78') ?><br />
          <?php endif ?>
          <?php echo $form['ruta_imagen']->renderError() ?>
          <?php echo $form['ruta_imagen'] ?>
          <?php echo $form['ruta_imagen']->renderHelp()?>
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
      <tr>
        <th><?php echo $form['numero_orden']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_orden']->renderError() ?>
          <?php echo $form['numero_orden'] ?>
          <?php echo $form['numero_orden']->renderHelp()?>
        </td>
      </tr>
    </tbody>
  </table>
  </fieldset>
  <table class="opciones_abajo">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="boton" href="<?php echo url_for('panoramica/panoramicasDeSala?id_sala='.$sala->getId()) ?>"><?php echo image_tag('reset')?>&nbsp;Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
           <?php echo link_to(image_tag('delete').' '.'Eliminar', 'panoramica/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar la panoramica?\nTenga en cuenta que al eliminarla se eliminar\u00e1n todas las exposiciones puestas en ella.\nPrefiera editar.', 'class' => 'boton')) ?>
          <?php endif; ?>
          <button type="submit"><?php echo image_tag('ok')?>&nbsp;Guardar</button>
        </td>
      </tr>
    </table>
    
</form>
