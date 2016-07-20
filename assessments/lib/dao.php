<?php
require_once("koneksi.php");

abstract class DAO{
	var $koneksi;
	var $className;
	var $tableName;
	var $fieldKey;
	var $fieldOrder;
	var $fieldNumber;
	var $fieldNames=array();
	var $fieldHeaders=array();
	var $fieldTypes=array();
        var $fieldRequireds=array();
        var $tabelRefers=array();
	
	
	public function DAO(){
		$this->koneksi = new Koneksi();
	}	

	public function isExist($model){
		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM ".$this->tableName.
		         " WHERE ".$this->fieldKey."='".$model->getKeyValue()."'";
		
		$result = mysql_query($query);
		return @mysql_num_rows($result);
			
		$this->koneksi->Putuskan();
	}
	public function getObjectByKey($key){
		$model = NULL;
		if($this->fieldTypes[0]=="INT"||gettype($key)=="DOUBLE"){
			if($key==null){
				$key=-99999;
			}
		}
		else{
			if($key==null){
				$key="'-99999'";
			}
			else{
				$key="'".$key."'";
			}
			
		}
		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM ".$this->tableName.
		         " WHERE ".$this->fieldKey."=".$key;
		//echo "q : $query\n";
		if(!$result = mysql_query($query)){
			echo "q : $query\n";
		}
		if($row=mysql_fetch_row($result)){
			$model = new $this->className();
			for($i=0;$i<$this->fieldNumber;$i++){
				$value=$row[$i];
				if($this->tabelRefers[$i]!=""){
                                    $className = $this->tabelRefers[$i]."_DAO";
                                    $referdao = new $className();
                                    $value = $referdao->getObjectByKey($value);
                                }
				$model->setField($i,$value);
				//$model->setField($i,$row[$i]);	
				
			}		
		}	
		else{
			//echo "q : $query\n";
		}
		$this->koneksi->Putuskan();
		return $model;
	}
	public function getListObject(){
		$model = array();
		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM ".$this->tableName." ORDER BY ".$this->fieldOrder." ASC";
		
		//echo $query;
		
		$result = mysql_query($query);
                 
		$k=0;
		while($row=mysql_fetch_assoc($result)){
			$model[$k] = new $this->className();
			for($i=0;$i<$this->fieldNumber;$i++){
                                $value =   $row[$this->fieldNames[$i]];   
                                
                                if($this->tabelRefers[$i]!=""){
                                    $className = $this->tabelRefers[$i]."_DAO";
                                    $referdao = new $className();
                                    $value = $referdao->getObjectByKey($row[$this->fieldNames[$i]]);
                                }
				$model[$k]->setField($i,$value);
			}
			$k++;		
		}
		$this->koneksi->Putuskan();
		return $model;
	}
        
	public function Insert($model){
		$temp_value="";
		$query = "INSERT INTO ".$this->tableName."(";
		for($i=0;$i<$this->fieldNumber-1;$i++){
			$query.=$this->fieldNames[$i].",";	
		}
		
		$query.=$this->fieldNames[$i].") values(";
		
		for($i=0;$i<$this->fieldNumber;$i++){
			if(is_object($model->getField($i))){
				$temp_value = $model->getField($i)->getKeyValue();
			}
			else
			{
				$temp_value = $model->getField($i);
			}
			
		
			if(gettype($temp_value)=="integer"||
			   gettype($temp_value)=="double"){
				$query.="".$temp_value."";	
			}
			else{
				$temp_value = addslashes($temp_value);
				$query.="'".$temp_value."'";
			}	
			if($i==$this->fieldNumber-1){
				$query.=")";	
			}
			else{
				$query.=",";
			}
			
		}
			//echo $query."\n";	 
		$this->koneksi->Sambungkan();
		$result = mysql_query($query);
		if(!$result){echo $query."\n";}
		$this->koneksi->Putuskan();
		return $result;
	}
	public function Update($model){
		$temp_value="";
		$query = "UPDATE ".$this->tableName." SET ";
		for($i=1;$i<$this->fieldNumber;$i++){
			$query.=$this->fieldNames[$i]." = ";	
			
			if(is_object($model->getField($i))){
				$temp_value = $model->getField($i)->getKeyValue();
			}
			else
			{
				$temp_value = $model->getField($i);
			}
			
		
			if(gettype($temp_value)=="integer"||
			   gettype($temp_value)=="double"){
				$query.="".$temp_value."";	
			}
			else{
				$temp_value=addslashes($temp_value);
				$query.="'".$temp_value."'";
			}	
			
			if($i==$this->fieldNumber-1){
				$query.=" ";	
			}
			else{
				$query.=", ";
			}
		}
		$query .= " WHERE ".$this->fieldKey." = ";
		
		if(gettype($model->getKeyValue())=="integer"||
		   gettype($model->getKeyValue())=="double"){
			$query.="".$model->getKeyValue()."";	
		}
		else{
			$query.="'".$model->getKeyValue()."'";
		}	
		
			//echo $query."\n";	 
		$this->koneksi->Sambungkan();
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function Delete($model){
		$query = "DELETE FROM ".$this->tableName.
		         " WHERE ".$this->fieldKey."='".$model->getKeyValue()."'";		 
		
		$this->koneksi->Sambungkan();
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function DeleteByKey($key){
		$query = "DELETE FROM ".$this->tableName.
		         " WHERE ".$this->fieldKey."='".$key."'";		 
		
		$this->koneksi->Sambungkan();
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return $result;
	}
	public function Save($model){
		if($this->isExist($model)){
			return $this->Delete($model);	
		}
		return $this->Insert($model);
	}
	public function getListObjectJSON(){
		$model = array();
		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM ".$this->tableName." ORDER BY ".$this->fieldOrder." ASC";

		if(!$result = mysql_query($query)){
			echo "error : ".$query."<br>";
		}
		while($row=mysql_fetch_assoc($result)){
			$model[] = $row;	
		}

		$this->koneksi->Putuskan();

		$json = json_encode($model);
		return $json;
	}
	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
?>