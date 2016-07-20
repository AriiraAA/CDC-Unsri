<?php
/*
fileName : t_posting_model.php
*/
require_once("../lib/model.php");

class T_posting extends Model{
	private $posting_id;
	private $posting_category_id;
	private $posting_day;
	private $posting_date;
	private $posting_title;
	private $posting_type;
	private $posting_content;
	private $posting_module;
	private $posting_uri;
	private $posting_url;
	private $posting_target;
	private $posting_image;
	private $posting_image_desc;
	private $posting_by;
	private $posting_hits;
	private $posting_visible;
	private $posting_comment_status;

	public function T_posting(){
	}

	public function setPosting_id($_posting_id){
		$this->posting_id=$_posting_id;
	}
	public function setPosting_category_id($_posting_category_id){
		$this->posting_category_id=$_posting_category_id;
	}
	public function setPosting_day($_posting_day){
		$this->posting_day=$_posting_day;
	}
	public function setPosting_date($_posting_date){
		$this->posting_date=$_posting_date;
	}
	public function setPosting_title($_posting_title){
		$this->posting_title=$_posting_title;
	}
	public function setPosting_type($_posting_type){
		$this->posting_type=$_posting_type;
	}
	public function setPosting_content($_posting_content){
		$this->posting_content=$_posting_content;
	}
	public function setPosting_module($_posting_module){
		$this->posting_module=$_posting_module;
	}
	public function setPosting_uri($_posting_uri){
		$this->posting_uri=$_posting_uri;
	}
	public function setPosting_url($_posting_url){
		$this->posting_url=$_posting_url;
	}
	public function setPosting_target($_posting_target){
		$this->posting_target=$_posting_target;
	}
	public function setPosting_image($_posting_image){
		$this->posting_image=$_posting_image;
	}
	public function setPosting_image_desc($_posting_image_desc){
		$this->posting_image_desc=$_posting_image_desc;
	}
	public function setPosting_by($_posting_by){
		$this->posting_by=$_posting_by;
	}
	public function setPosting_hits($_posting_hits){
		$this->posting_hits=$_posting_hits;
	}
	public function setPosting_visible($_posting_visible){
		$this->posting_visible=$_posting_visible;
	}
	public function setPosting_comment_status($_posting_comment_status){
		$this->posting_comment_status=$_posting_comment_status;
	}

	public function getPosting_id(){
		return $this->posting_id;
	}
	public function getPosting_category_id(){
		return $this->posting_category_id;
	}
	public function getPosting_day(){
		return $this->posting_day;
	}
	public function getPosting_date(){
		return $this->posting_date;
	}
	public function getPosting_title(){
		return $this->posting_title;
	}
	public function getPosting_type(){
		return $this->posting_type;
	}
	public function getPosting_content(){
		return $this->posting_content;
	}
	public function getPosting_module(){
		return $this->posting_module;
	}
	public function getPosting_uri(){
		return $this->posting_uri;
	}
	public function getPosting_url(){
		return $this->posting_url;
	}
	public function getPosting_target(){
		return $this->posting_target;
	}
	public function getPosting_image(){
		return $this->posting_image;
	}
	public function getPosting_image_desc(){
		return $this->posting_image_desc;
	}
	public function getPosting_by(){
		return $this->posting_by;
	}
	public function getPosting_hits(){
		return $this->posting_hits;
	}
	public function getPosting_visible(){
		return $this->posting_visible;
	}
	public function getPosting_comment_status(){
		return $this->posting_comment_status;
	}

	public function getKeyValue(){
		return $this->posting_id;
	}
	public function getDescriptionValue(){
		return $this->nama;
	}
	public function setField($index, $value){
		switch($index){
			case 0:$this->setPosting_id($value);break;
			case 1:$this->setPosting_category_id($value);break;
			case 2:$this->setPosting_day($value);break;
			case 3:$this->setPosting_date($value);break;
			case 4:$this->setPosting_title($value);break;
			case 5:$this->setPosting_type($value);break;
			case 6:$this->setPosting_content($value);break;
			case 7:$this->setPosting_module($value);break;
			case 8:$this->setPosting_uri($value);break;
			case 9:$this->setPosting_url($value);break;
			case 10:$this->setPosting_target($value);break;
			case 11:$this->setPosting_image($value);break;
			case 12:$this->setPosting_image_desc($value);break;
			case 13:$this->setPosting_by($value);break;
			case 14:$this->setPosting_hits($value);break;
			case 15:$this->setPosting_visible($value);break;
			case 16:$this->setPosting_comment_status($value);break;
		}
	}
	public function getField($index){
		switch($index){
			case 0:return $this->getPosting_id();break;
			case 1:return $this->getPosting_category_id();break;
			case 2:return $this->getPosting_day();break;
			case 3:return $this->getPosting_date();break;
			case 4:return $this->getPosting_title();break;
			case 5:return $this->getPosting_type();break;
			case 6:return $this->getPosting_content();break;
			case 7:return $this->getPosting_module();break;
			case 8:return $this->getPosting_uri();break;
			case 9:return $this->getPosting_url();break;
			case 10:return $this->getPosting_target();break;
			case 11:return $this->getPosting_image();break;
			case 12:return $this->getPosting_image_desc();break;
			case 13:return $this->getPosting_by();break;
			case 14:return $this->getPosting_hits();break;
			case 15:return $this->getPosting_visible();break;
			case 16:return $this->getPosting_comment_status();break;
		}
	}
}
?>