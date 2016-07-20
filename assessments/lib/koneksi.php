<?php
/*
 * koneksi.php
 * oleh: obets
 */

class Koneksi{
	var $host;
	var $user;
	var $password;
	var $database;
	
	public function __construct(){
		/*
		$this->host="proremun.ilkom.unsri.ac.id";
		$this->user="tsa_unsri_user";
		$this->password="siplahitu";
		$this->database="tsa_unsri_2016";	
		*/
		$this->host="localhost";
		$this->user="root";
		$this->password="";
		//$this->database="web_portal_cdc_unsri";
		$this->database="db_web_portal";
	}	
	public function Sambungkan(){
		if(!mysql_connect($this->host,$this->user,$this->password)){
			die("gagal sambung ke server db");
		}
		else{
			if(!mysql_select_db($this->database)){
				die("gagal sambung ke database");	
			}
		}
	}
	public function Putuskan(){
		@mysql_close();	
	}
}
?>