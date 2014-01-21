<tr id="imagen_<?php echo $counter?>">
  <td><?php echo $exposicion_imagen['ruta_imagen']?><?php echo $exposicion_imagen['ruta_imagen']->renderError() ?></td>
  <td><?php echo $exposicion_imagen['principal']?></td>
  <td>&nbsp;</td>
  <td><a class="borrar_imagen_anadida" id="<?php echo $exposicion_imagen['id']->getValue()?>" onclick="borrarExposicionImagen(<?php echo $counter?>)"><?php echo image_tag('delete', 'title= Eliminar imagen')?></a></td>
</tr>