<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $recorrido->getId() ?></td>
    </tr>
    <tr>
      <th>Tipo:</th>
      <td><?php echo $recorrido->getTipo() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $recorrido->getEstado() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('recorrido/edit?id='.$recorrido->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('recorrido/index') ?>">List</a>
