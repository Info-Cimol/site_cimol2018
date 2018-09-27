<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View {
	
	private $CI;
	private $tema;
	
	
	
	function __construct(){
		$this->CI =& get_instance();
		$this->tema="default";
	}
	
	function setTema($tema){
		$this->tema=$tema;
	}
	
	function show_view($vars=null)
	{
		
		$this->CI->load->view('temas/default/index', $vars);
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