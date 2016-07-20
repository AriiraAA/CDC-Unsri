<?php
@session_start();
require_once("../lib/controller.php");
require_once("../models/t_posting_model.php");
require_once("../views/posting_view.php");
require_once("../daos/t_posting_dao.php");
require_once("../daos/t_comments_dao.php");
require_once("../daos/t_posting_tag_dao.php");

class Posting_controller extends Controller{
	var $view;
	var $dao;
	var $model;
	var $comment_dao;
	var $posting_tag_dao;
	
	public function __construct(){
		$this->view =  new Posting_view();
		$this->dao =  new T_posting_DAO();
		$this->comment_dao =  new T_comments_DAO();
		$this->posting_tag_dao =  new T_posting_tag_DAO();
	}

	public function SaveObject(){
		
	}
	public function DeleteObject(){
		
	}
	public function ViewHome(){
		$awal=0;
		$jumlah_data=2;
		$resultNewsFeeds  = $this->dao->getListNewsFeeds($awal,$jumlah_data);
		$resultJobSeekers  = $this->dao->getListJobSeekers($awal,$jumlah_data);
		$html = $this->view->Home($resultNewsFeeds,$resultJobSeekers);
		echo $html;
	}
	public function ViewAbout(){
		$html = $this->view->About();
		echo $html;
	}
	public function ViewJobSeekersPage(){
		$awal=0;
		$jumlah_data=3;
		$resultJobVacancies  = $this->dao->getListJobVacancies($awal,$jumlah_data);
		$resultJobFairs  = $this->dao->getListJobFairs($awal,$jumlah_data);
		$html = $this->view->JobSeekersPage($resultJobVacancies,$resultJobFairs);
		echo $html;
	}
	public function ViewNewsFeeds(){
		$awal=0;
		$jumlah_data=3;
		$result  = $this->dao->getListNewsFeeds($awal,$jumlah_data);
		$html = $this->view->NewsFeeds($result);
		echo $html;
	}
	public function LoadListPosting(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListNewsFeeds($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function LoadListJobVacancies(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListJobVacancies($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function LoadListJobFairs(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListJobFairs($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function LoadListTrainings(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListTrainings($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function LoadListCounselings(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListCounselings($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function LoadListConsultings(){
		$awal=$_POST['awal'];
		$jumlah_data=3;
		$result  = $this->dao->getListConsultings($awal,$jumlah_data);
		$html = $this->view->LoadListPosting($result);
		echo $html;
	}
	public function ViewPostingDetail(){
		$posting_id = $_GET['posting_id'];
		$detailPosting  = $this->dao->getObjectByKey($posting_id);
		$hits = $detailPosting->getPosting_hits();
		$hits++;
		$detailPosting->setPosting_hits($hits);
		$this->dao->Update($detailPosting);
		$resultListComments  = $this->comment_dao->getResultListCommentsByPosting($posting_id);
		$resultListTags  = $this->posting_tag_dao->getResultListTagsByPosting($posting_id);
		$html = $this->view->PostingDetail($detailPosting, $resultListComments,$resultListTags);
		echo $html;
	}
	public function ViewCharts(){
		$html = $this->view->Charts();
		echo $html;
	}
	public function ViewTrainings(){
		$awal=0;
		$jumlah_data=3;
		$result  = $this->dao->getListTrainings($awal,$jumlah_data);
		$html = $this->view->Trainings($result);
		echo $html;
	}
	public function ViewCounselings(){
		$awal=0;
		$jumlah_data=3;
		$result  = $this->dao->getListCounselings($awal,$jumlah_data);
		$html = $this->view->Counselings($result);
		echo $html;
	}
	public function ViewConsultings(){
		$awal=0;
		$jumlah_data=3;
		$result  = $this->dao->getListConsultings($awal,$jumlah_data);
		$html = $this->view->Consultings($result);
		echo $html;
	}
	public function ViewMemberships(){
		$html = $this->view->Memberships();
		echo $html;
	}
	public function ViewSurveys(){
		$html = $this->view->Surveys();
		echo $html;
	}
	public function ViewLinks(){
		$html = $this->view->Links();
		echo $html;
	}
	public function ViewTips(){
		$html = $this->view->Tips();
		echo $html;
	}
	public function ViewGalleries(){
		$html = $this->view->Galleries();
		echo $html;
	}
	public function AdditionalAction($action){
		switch($action){
			case "Home":
				$this->ViewHome();
			break;	
			case "About":
				$this->ViewAbout();
			break;
			case "NewsFeeds":
				$this->ViewNewsFeeds();
			break;
			case "JobSeekersPage":
				$this->ViewJobSeekersPage();
			break;
			case "PostingDetail":
				$this->ViewPostingDetail();
			break;
			case "LoadListPosting":
				$this->LoadListPosting();
			break;
			case "LoadListJobVacancies":
				$this->LoadListJobVacancies();
			break;
			case "LoadListJobFairs":
				$this->LoadListJobFairs();
			break;
			case "LoadListTrainings":
				$this->LoadListTrainings();
			break;
			case "LoadListCounselings":
				$this->LoadListCounselings();
			break;
			case "LoadListConsultings":
				$this->LoadListConsultings();
			break;
			case "Charts":
				$this->ViewCharts();
			break;
			case "Trainings":
				$this->ViewTrainings();
			break;
			case "Counselings":
				$this->ViewCounselings();
			break;
			case "Consultings":
				$this->ViewConsultings();
			break;
			case "Memberships":
				$this->ViewMemberships();
			break;
			case "Surveys":
				$this->ViewSurveys();
			break;
			case "Links":
				$this->ViewLinks();
			break;
			case "Tips":
				$this->ViewTips();
			break;
			case "Galleries":
				$this->ViewGalleries();
			break;
		}
	}
}

$controller = new Posting_controller();
$controller->Run();
?>