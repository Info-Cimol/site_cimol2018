<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View {
	
	private $CI;
	private $tema;
	//private $modulo;
	
	
	function __construct(){
		$this->CI =& get_instance();
		//$this->tema="default";
	}
	
	function setTema($tema){
		//$this->modulo=$modulo;
		$this->tema=$tema;
	}
	
	function show_view($vars=null)
	{
		//echo $this->config->item("tema");
       	//print_r($_SERVER);
		//print_r($vars);
		//stract($vars);
		//include $this->tema.'index.php' ;
		
		$this->CI->load->view('temas/'.$this->tema, $vars);
	}


	function set_message($message,$class){
		$msg['message']=$message;
		$msg['class']=$class;
		$_SESSION['messages'][]=$msg;
	}
	function show_message(){
		echo "<div id='messages'>";
		foreach($_SESSION['messages'] as $message){
			echo "<div class='".$message['class']."'>";
			echo $message['message'];
 			echo "</div>";
		}
		echo "</div>";
		?>
			<script>
			setTimeout(function() {
				$('#messages').fadeOut(700);}, 5000);
			</script>
		<?php 
	}

	function remove_message(){
		unset($_SESSION['messages']);
	}
}