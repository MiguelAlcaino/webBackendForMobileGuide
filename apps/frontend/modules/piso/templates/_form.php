<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('piso/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?numero_piso='.$form->getObject()->getNumeroPiso() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <fieldset>
  <legend>Datos del piso</legend>
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['ruta_imagen']->renderLabel() ?></th>
        <td>
          <?php echo $form['ruta_imagen']->renderError() ?>
          <?php echo $form['ruta_imagen'] ?>
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
    <table class="opciones_abajo">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a class="boton" href="<?php echo url_for('piso/index') ?>"><?php echo image_tag('reset')?>&nbsp;Volver</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to(image_tag('delete').' '.'Eliminar', 'piso/delete?numero_piso='.$form->getObject()->getNumeroPiso(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar este piso?\nTenga en cuenta que al eliminarlo, tambi\u00E9n se eliminaran las salas, panoramicas y expoiciones asociadas.\nPrefiera editar.', 'class' => 'boton')) ?>
          <?php endif; ?>
          <button type="submit"><?php echo image_tag('ok')?>&nbsp;Guardar</button>
        </td>
      </tr>
    </table>
</form>
