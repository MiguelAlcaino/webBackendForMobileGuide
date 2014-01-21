<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $exposicion->getId() ?></td>
    </tr>
    <tr>
      <th>Id panoramica:</th>
      <td><?php echo $exposicion->getIdPanoramica() ?></td>
    </tr>
    <tr>
      <th>Codigo:</th>
      <td><?php echo $exposicion->getCodigo() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $exposicion->getNombre() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $exposicion->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Num sonido:</th>
      <td><?php echo $exposicion->getNumSonido() ?></td>
    </tr>
    <tr>
      <th>Num imagenes:</th>
      <td><?php echo $exposicion->getNumImagenes() ?></td>
    </tr>
    <tr>
      <th>Cord x:</th>
      <td><?php echo $exposicion->getCordX() ?></td>
    </tr>
    <tr>
      <th>Cord y:</th>
      <td><?php echo $exposicion->getCordY() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $exposicion->getEstado() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('exposicion/edit?id='.$exposicion->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('exposicion/index') ?>">List</a>
