<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $panoramica->getId() ?></td>
    </tr>
    <tr>
      <th>Id sala:</th>
      <td><?php echo $panoramica->getIdSala() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $panoramica->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Ruta imagen:</th>
      <td><?php echo $panoramica->getRutaImagen() ?></td>
    </tr>
    <tr>
      <th>Numero orden:</th>
      <td><?php echo $panoramica->getNumeroOrden() ?></td>
    </tr>
    <tr>
      <th>Ruta imagen miniatura:</th>
      <td><?php echo $panoramica->getRutaImagenMiniatura() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('panoramica/edit?id='.$panoramica->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('panoramica/index') ?>">List</a>
