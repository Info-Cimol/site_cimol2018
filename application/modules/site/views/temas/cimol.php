<?php
//echo APPPATH."modules/site/views/".$content.".php";
//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
require_once($this->config->item("base_dir").'public/temas/cimol/header.php');
//require_once($this->config->item("base_dir").'public/temas/cimol/nav.php');

require_once($this->config->item("base_dir").'public/temas/cimol/content.php');
require_once(APPPATH."modules/site/views/".$content.".php");
<<<<<<< HEAD
=======

>>>>>>> 33c5355b90d4646f931ab4252efdce4940db8ed1
require_once($this->config->item("base_dir").'public/temas/cimol/footer.php');
