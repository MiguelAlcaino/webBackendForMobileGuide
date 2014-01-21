<h1>Pisos del museo</h1>

<table id="tabla_de_salas">
  <tbody>
    <tr>
    <?php foreach ($pisos as $piso): ?>
    
      <td>
        <div id="sala">
            <span id="sala_titulo" >Piso <?php echo $piso->getNumeroPiso()?></span>
            <br />
            <?php echo image_tag(public_path('uploads/imagenes/',true).$piso->getRutaImagen(), 'size=150x80')?>
          <table>
             <tr class="sala_submenu" bgcolor="<?php echo $piso->getEstado() ? 'green': 'red'?>">
              <td>
                <div class="sala_opcion">Estado: </div>
                <div class="sala_iconos">
                  <?php echo $piso->getEstado() ? image_tag('ok', 'title= El piso esta activado. Ser&aacute; visible en la gu&iacute;a.') : image_tag('cancel', 'title=EL piso esta desactivado. No ser&aacute; visible en la gu&iacute;a.')?>
                </div>
              </td>
             </tr>
             <tr>
              <td>
                <div class="sala_opcion">Piso</div>
                <div class="sala_iconos">
                  <?php echo link_to(image_tag('edit','title=Editar este piso'), 'piso/edit?numero_piso='.$piso->getNumeroPiso())?>
                  <?php echo link_to(image_tag('delete', 'title=Eliminar este piso del museo'), 'sala/delete?numero_piso='.$piso->getNumeroPiso(), array('method' => 'delete', 'confirm' => 'Esta seguro de querer eliminar este piso?\nTenga en cuenta que al eliminarlo, se eliminaran de forma permanente todas las salas, panoramicas y exposiciones asociadas a &eacute;l. ')) ?>
                </div>
              </td>
             </tr>
             <tr>
              <td>
                <div class="sala_opcion">Salas</div>
                <div class="sala_iconos">
                  <?php echo link_to(image_tag('list', 'title=Lista de salas de este piso'), 'sala/index?numero_piso='.$piso->getNumeroPiso())?>
                </div>
              </td>
             </tr>
          </table>
        </div>
      </td>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
<table class="opciones_abajo">
  <tr>
    <td><a class="boton" href="<?php echo url_for('piso/new') ?>"><?php echo image_tag('add')?>&nbsp;Agregar nuevo piso al museo</a></td>
  </tr>
</table>