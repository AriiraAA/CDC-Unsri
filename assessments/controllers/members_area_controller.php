<?php  
@session_start();
require_once("../lib/controller.php");
require_once("../models/members_area_model.php");
require_once("../views/members_area_view.php");

class Members_area_controller extends Controller {
	
	var $model;
	var $view;

	public function __construct() {
		$this->model = new Members_area_model();
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

	public function MemberLogin() {
		$member = $this->model->get_member($_POST['id_member'], $_POST['password']);
		if ($this->model->rows == 1) {
			$_SESSION['id_member'] = $member['id_member'];
		}

		if (isset($_SESSION['id_member'])) {
			$this->ViewAssessments($_SESSION['id_member']);
		} else {
			$this->ViewGagalLogin();
		}
	}

	public function MemberLogout() {
		session_destroy();
		$this->ViewLogin();
	}

	private function ViewBuatAssessments() {
		echo $this->view->Assessments();
	}

	private function ViewAssessments($id_member) {
		echo $this->view->BuatAssessments($id_member);
	}

	private function ViewGagalLogin() {
		echo $this->view->GagalLogin();
	}

	private function ViewProfileSettings() {
		echo $this->view->ProfileSettings();
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
			case "MemberLogin":
				$this->MemberLogin();
				break;
			case "MemberLogout":
				$this->MemberLogout();
				break;
			case "ProfileSettings":
				$this->ViewProfileSettings();
				exit;
			case "BuatAssessments":
				$this->ViewBuatAssessments();
				exit;
		}
	}
}

$controller = new Members_area_controller();
$controller->Run();
?>