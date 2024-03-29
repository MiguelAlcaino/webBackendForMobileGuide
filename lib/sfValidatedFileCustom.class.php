<?php

class sfValidatedFileCustom extends sfValidatedFile{

  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777) {
     
      $panoramica = sfContext::getInstance()->getRequest()->getParameter('panoramica');
      
      //
      $file=$panoramica['id_sala'].'panoramica'.$panoramica['numero_orden'].$this->getExtension('jpg');
        // let the parent class save the file and do what it normally does
      
	$saved = parent::save($file, $fileMode, $create, $dirMode);
       /* Here we will put all our custom logic. Say, to create a thumbnail,
         or maybe manipulate it in whatever way you see fit.
        There are many possibilities here, so see the extended
        class sfValidatedFile in the Symfony 1.4 API Documentation
        to get a better idea about what you can manipulate and extend */

         // return the saved file as normal

         return $saved;
         //}
  }
}

