<?php
class Base extends CI_Model{
   function getBaseArray(){
        return array('base'=> base_url(), 'site'=>site_url(), 'docs'=> base_url('docs'), 'img'=> base_url('images'), 'css'=> base_url('css'), 'js'=>base_url('js')); 
   }
}
?>
