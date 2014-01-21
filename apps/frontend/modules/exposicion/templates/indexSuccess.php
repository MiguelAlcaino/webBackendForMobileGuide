<h1>Exposicions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id panoramica</th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Num sonido</th>
      <th>Num imagenes</th>
      <th>Cord x</th>
      <th>Cord y</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($exposicions as $exposicion): ?>
    <tr>
      <td><a href="<?php echo url_for('exposicion/show?id='.$exposicion->getId()) ?>"><?php echo $exposicion->getId() ?></a></td>
      <td><?php echo $exposicion->getIdPanoramica() ?></td>
      <td><?php echo $exposicion->getCodigo() ?></td>
      <td><?php echo $exposicion->getNombre() ?></td>
      <td><?php echo $exposicion->getDescripcion() ?></td>
      <td><?php echo $exposicion->getNumSonido() ?></td>
      <td><?php echo $exposicion->getNumImagenes() ?></td>
      <td><?php echo $exposicion->getCordX() ?></td>
      <td><?php echo $exposicion->getCordY() ?></td>
      <td><?php echo $exposicion->getEstado() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('exposicion/new') ?>">New</a>
