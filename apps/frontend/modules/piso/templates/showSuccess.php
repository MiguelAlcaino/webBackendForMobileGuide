<table>
  <tbody>
    <tr>
      <th>Numero piso:</th>
      <td><?php echo $piso->getNumeroPiso() ?></td>
    </tr>
    <tr>
      <th>Ruta imagen:</th>
      <td><?php echo $piso->getRutaImagen() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $piso->getEstado() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('piso/edit?numero_piso='.$piso->getNumeroPiso()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('piso/index') ?>">List</a>
