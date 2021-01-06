<?php
include ('connection.php');
class AssetQuery{

	public $dbconn;
	public function __construct(){
		$obj = new DatabaseConn;
		$this->dbconn= $obj->connection();
	}
	
	// Insert in admin table
	public function regAdmin($names, $uname, $email, $pass){
		$sql= "INSERT INTO admin VALUES (null, '".$names."', '".$uname."', '".$email."', '".$pass."', NOW())";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}
	
	public function adminLogin($uname, $pass){
		$sql= "SELECT * FROM admin WHERE username='".$uname."'&&password='".$pass."'";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	
	public function techLogin($u_email, $pass){
		$sql= "SELECT * FROM user WHERE u_email='".$u_email."' && u_password='".$pass."'";
		$stmt=$this->dbconn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
	
	public function countAdmins() {
		$stmt=$this->dbconn->query("SELECT COUNT(*) FROM admin")->fetchColumn();
		return $stmt;		
	} 
	

    public function readAdmin(){
		$query= $this->dbconn->prepare("SELECT * FROM admin");
		$query->execute();
		return $query;
	}	
	
	
	public function addAsset($aname, $acode, $atype, $alocation, $deprec) {
		$sql= "INSERT INTO asset VALUES (null, '".$aname."', '".$acode."', '".$atype."', '".$alocation."', '".$deprec."')";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
	}

    public function readAssetById($aid){
		$query= $this->dbconn->prepare("SELECT * FROM asset WHERE a_id='".$aid."' ");
		$query->execute();
		return $query;
	}

    public function deleteAsset($aid){
		$query= $this->dbconn->prepare("DELETE FROM asset WHERE a_id='".$aid."' ");
		$query->execute();
		return $query;
	}

	public function updateAsset($aname, $acode, $atype, $deprec, $aid) {
		$sql= "UPDATE asset SET a_name ='".$aname."', a_code='".$acode."', a_type='".$atype."', a_depreciation='".$deprec."' WHERE a_id='".$aid."' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
	}


	public function transferAsset($aid, $location) {
		$sql= "UPDATE asset SET a_location='".$location."' WHERE a_id='".$aid."' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
	}

	
    public function readAsset(){
		$query= $this->dbconn->prepare("SELECT * FROM asset");
		$query->execute();
		return $query;
	}	
				
    public function readLabs(){
		$query= $this->dbconn->prepare("SELECT * FROM labs");
		$query->execute();
		return $query;
	}
	
	
	
	
		



	public function readOneData($id){
		$query= $this->dbconn->prepare("SELECT * FROM ? WHERE id= '".$id."' ");
		$query->execute();
		return $query;
	}

	public function deleteQuery($id){
		$query= $this->dbconn->prepare("DELETE FROM .. WHERE id='".$id."' ");
		$query->execute();
		$count= $query->rowCount();
		return $count;
	}

    public function updateInfo($id, $name) {
		// $sql= "UPDATE ? SET ?='".$name."', ?='".$."' WHERE id= '".$id."' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$c= $query->rowCount();
		return $c;
	}
}

?>