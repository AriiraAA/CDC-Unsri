<?php

abstract class Controller{
	var $view;
	var $dao;
	var $model;

	public function __construct(){
		
	}

	public function ViewListObject(){
		$listObject = $this->dao->getListObject();
		$html = $this->view->getListObjectHTML($listObject);
		echo $html;
	}
	public function ViewListObjectJSON(){
		$html = $this->dao->getListObjectJSON();
		echo $html;
	}
	abstract public function DeleteObject();
	abstract public function SaveObject();
	abstract public function ViewHome();
	abstract public function AdditionalAction($action);

	public function Run(){
		$action = $_GET['action'];
		switch($action){
			case "viewListObject":
				$this->ViewListObject();
			break;	
			case "viewListObjectJSON":
				$this->viewListObjectJSON();
			break;
			case "SaveObject":
				$this->SaveObject();
			break;	
			case "DeleteObject":
				$this->DeleteObject();
			break;	
			default:
				$this->AdditionalAction($action);
			break;
		}
	}


}

?>