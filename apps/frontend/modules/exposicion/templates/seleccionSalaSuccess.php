<?php echo form_tag('exposicion/new') ?>
<?php
echo select_tag('panoramica', options_for_select(array('0'=>'miguel','1'=>'carla','3'=>'josefa'),3));
?>

</form>