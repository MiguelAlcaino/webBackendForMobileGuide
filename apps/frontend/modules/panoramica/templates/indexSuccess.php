<h1>Panoramicas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id sala</th>
      <th>Descripcion</th>
      <th>Ruta imagen</th>
      <th>Numero orden</th>
      <th>Ruta imagen miniatura</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($panoramicas as $panoramica): ?>
    <tr>
      <td><a href="<?php echo url_for('panoramica/show?id='.$panoramica->getId()) ?>"><?php echo $panoramica->getId() ?></a></td>
      <td><?php echo $panoramica->getIdSala() ?></td>
      <td><?php echo $panoramica->getDescripcion() ?></td>
      <td><?php echo $panoramica->getRutaImagen() ?></td>
      <td><?php echo $panoramica->getNumeroOrden() ?></td>
      <td><?php echo $panoramica->getRutaImagenMiniatura() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<table>
  <tr>
    <td>
      <a class="boton" href="<?php echo url_for('panoramica/new') ?>">New</a>
    </td>
  </tr>
</table>