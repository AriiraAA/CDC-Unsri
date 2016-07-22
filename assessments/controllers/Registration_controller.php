<?php  
@session_start();
require_once("../lib/controller.php");
require_once("../views/Registration_view.php");

class Registration_controller extends Controller {
	
	var $view;

	public function __construct() {
		$this->view = new Registration_view();
	}

	public function SaveObject(){
		
	}
	public function DeleteObject(){
		
	}

	public function ViewHome() {
		
	}

	public function ViewRegistration() {
		echo $this->view->Registration();
	}

	public function ViewGuidelines() {
		echo $this->view->Guidelines();
	}

	public function AdditionalAction($action){
		switch($action){
			case "Registration":
				$this->ViewRegistration();
				break;
			case "Guidelines":
				$this->ViewGuidelines();
				break;
		}
	}
}

$controller = new Registration_controller();
$controller->Run();
?>