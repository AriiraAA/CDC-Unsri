<?php  
@session_start();
require_once("../lib/controller.php");
require_once("../views/members_area_view.php");

class Members_area_controller extends Controller {
	
	var $view;

	public function __construct() {
		$this->view = new Members_area_view();
	}

	public function SaveObject(){
		
	}
	public function DeleteObject(){
		
	}

	public function ViewHome() {
		
	}

	public function ViewLogin() {
		echo $this->view->Login();
	}

	public function ViewGuidelines() {
		echo $this->view->Guidelines();
	}

	public function AdditionalAction($action){
		switch($action){
			case "Login":
				$this->ViewLogin();
				break;
			case "Guidelines":
				$this->ViewGuidelines();
				break;
		}
	}
}

$controller = new Members_area_controller();
$controller->Run();
?>