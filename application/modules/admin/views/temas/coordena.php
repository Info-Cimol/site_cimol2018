<?php
//echo APPPATH."modules/site/views/".$content.".php";
//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
require_once($this->config->item("base_dir").'public/temas/admin/header.php');
//require_once($this->config->item("base_dir").'public/temas/cimol/nav.php');

require_once($this->config->item("base_dir").'public/temas/admin/content.php');
require_once(APPPATH."modules/site/views/".$content.".php");

require_once($this->config->item("base_dir").'public/temas/admin/footer.php');
