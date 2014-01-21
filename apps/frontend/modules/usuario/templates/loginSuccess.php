<?php if($sf_user->getFlash("error")): ?>
    <div class="error"><?php echo $sf_user->getFlash("error"); ?></div>
<?php endif; ?>

<h1>Indentif&iacute;quese como usuario</h1>
<form action="<?php echo url_for("usuario/login"); ?>" method="post">
  <?php echo $form->renderGlobalErrors()?>
  <table>
    <tr>
      <td>Usuario</td>
      <td><?php echo $form['usuario'] ?></td>
    </tr>
    <tr>
      <td>Contrase&ntilde;a</td>
      <td><?php echo $form['password'] ?></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" value="Entrar" /></td>
    </tr>
  
  <?php echo $form['_csrf_token'] ?>
  
  </table>
</form>