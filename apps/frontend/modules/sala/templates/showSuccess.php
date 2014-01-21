<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sala->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $sala->getNombre() ?></td>
    </tr>
    <tr>
      <th>Sala numero:</th>
      <td><?php echo $sala->getSalaNumero() ?></td>
    </tr>
    <tr>
      <th>Numero panoramicas:</th>
      <td><?php echo $sala->getNumeroPanoramicas() ?></td>
    </tr>
    <tr>
      <th>Ruta imagen miniatura:</th>
      <td><?php echo $sala->getRutaImagenMiniatura() ?></td>
    </tr>
    <tr>
      <th>Piso:</th>
      <td><?php echo $sala->getPiso() ?></td>
    </tr>
    <tr>
      <th>Cord x:</th>
      <td><?php echo $sala->getCordX() ?></td>
    </tr>
    <tr>
      <th>Cord y:</th>
      <td><?php echo $sala->getCordY() ?></td>
    </tr>
    <tr>
      <th>Numero panoramica principal:</th>
      <td><?php echo $sala->getNumeroPanoramicaPrincipal() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sala/edit?id='.$sala->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sala/index') ?>">List</a>
