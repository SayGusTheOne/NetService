<?php
spl_autoload_register(function ($nomeClasse){
   if (file_exists($nomeClasse)){
       require_once($nomeClasse . ".php");
   }
});