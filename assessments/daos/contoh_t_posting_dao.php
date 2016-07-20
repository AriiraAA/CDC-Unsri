<?php
/*
fileName : t_posting_dao.php
*/
require_once("../lib/dao.php");

class T_posting_DAO extends DAO{
	public function T_posting_DAO(){
		parent::DAO();
		$this->className="T_posting";
		$this->tableName="t_posting";
		$this->fieldKey="posting_id";
		$this->fieldOrder="posting_id";
		$this->fieldNumber="17";
		$this->fieldNames=array("posting_id","posting_category_id","posting_day","posting_date","posting_title","posting_type","posting_content","posting_module","posting_uri","posting_url","posting_target","posting_image","posting_image_desc","posting_by","posting_hits","posting_visible","posting_comment_status");
		$this->fieldHeaders=array("Posting id","Posting category id","Posting day","Posting date","Posting title","Posting type","Posting content","Posting module","Posting uri","Posting url","Posting target","Posting image","Posting image desc","Posting by","Posting hits","Posting visible","Posting comment status");
		$this->fieldTypes=array("BIGINT UNSIGNED","INT","VARCHAR","DATETIME","VARCHAR","ENUM","LONGTEXT","VARCHAR","VARCHAR","VARCHAR","ENUM","VARCHAR","VARCHAR","VARCHAR","BIGINT UNSIGNED","ENUM","ENUM");
		$this->fieldRequireds=array("required","required","required","required","required","required","required","required","required","required","required","required","required","required","required","required","required");
		$this->tabelRefers=array("","","","","","","","","","","","","","","","","");
	}
	public function getListNewsFeeds($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE t_posting.posting_category_id IN (1,4,7,8,9,10,11,13) 
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListJobSeekers($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE t_posting.posting_category_id IN (2) 
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListJobVacancies($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE t_posting.posting_category_id IN (2) 
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListJobFairs($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE t_posting.posting_category_id IN (0) 
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListTrainings($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE (t_posting.posting_category_id IN (12) 
					OR t_posting.posting_title like '%pelatihan%'
					OR  t_posting.posting_title like '%training%')
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListCounselings($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE (t_posting.posting_category_id IN (14) 
					OR t_posting.posting_title like '%konseling%'
					OR  t_posting.posting_title like '%counseling%')
					AND t_posting.posting_visible='1' 
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function getListConsultings($awal,$jumlah_data){
		$this->koneksi->Sambungkan();
		$query = "SELECT t_posting.*, agregat_comments.jumlah_comment
					FROM t_posting 
					LEFT JOIN (
						SELECT t_comments.`comment_posting_id`, COUNT(t_comments.`comment_posting_id`) AS jumlah_comment
						FROM t_comments
						WHERE t_comments.`comment_approval`='1'
						GROUP BY t_comments.`comment_posting_id`
					) AS agregat_comments ON (agregat_comments.`comment_posting_id` = t_posting.`posting_id` )
					WHERE t_posting.posting_category_id IN (0) 
					AND t_posting.posting_visible='1'
					ORDER BY posting_date DESC" ;
		$query .= " limit ".$awal.",".$jumlah_data."";
		
		//echo $query;
		
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
}
?>