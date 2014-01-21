<script language="javascript">
$(document).ready(function(){
  $('.ayuda .ayuda_contenido').hide();
  $('.ayuda').click(function(){
    $(this).children('.ayuda_titulo').toggleClass('active');
    $(this).children('.ayuda_contenido').slideToggle('slow');
  });
});
</script>

<h1>Ayuda</h1>
<div class="ayuda">
<div class="ayuda_titulo">Iconolog&iacute;a</div>
<div class="ayuda_contenido">El sistema fue dise&ntilde;ado con &iacute;conos, tal que usted pueda interactuar con ellos de manera intuitiva.<br />
  Si usted situa el cursor sobre alg&uacute;n &iacute;cono, podr&aacute; ver una peque&ntilde;a ayuda de lo que &eacute;ste significa.
  <br /> 
  A continuaci&oacute;n se detallar&aacute; la functionalidad de cada &iacute;cono:
    <ul>
      <li>
        <strong>&Iacute;conos</strong>
        <ul>
          <li><?php echo image_tag('add')?>: Significa que puede agregar un elemento.</li>
          <li><?php echo image_tag('delete')?>: Significa que puede eliminar un elemento.</li>
          <li><?php echo image_tag('list')?>: Signidica que puede ver una lista de los elementos que se describen</li>
        </ul>
      </li>
      <li><strong>&Iacute;conos de estado y colores</strong>
        <ul>
          <li><?php echo image_tag('ok')?>: Cada vez que usted vea este &iacute;cono y/o el color verde, significa que el elemento se encuentra activado y podr&aacute; ser visible en la gu&iacute;a m&oacute;vil.</li>
          <li><?php echo image_tag('cancel')?>: Cada vez que usted vea este &iacute;cono</li>
        </ul>
      </li>
    </ul>
  </div>
</div>
