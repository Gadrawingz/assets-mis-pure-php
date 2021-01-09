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
	
	public function adminLogin(){
		$sql= "SELECT * FROM admin WHERE username='".$_POST['username']."'&& password='".$_POST['username']."'";
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

    public function readOneAsset($aid){
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
		$query= $this->dbconn->prepare("SELECT * FROM asset ");
		$query->execute();
		return $query;
	}

    public function readAssetLoc($lab){
		$query= $this->dbconn->prepare("SELECT * FROM asset WHERE a_location='$lab' ");
		$query->execute();
		return $query;
	}	




	public function addLab($lname, $uid) {
		$sql= "INSERT INTO labs VALUES (null, '".$lname."', '".$uid."')";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
	}

    public function readOneLab($uid){
		$query= $this->dbconn->prepare("SELECT * FROM labs WHERE lab_tech='".$uid."'");
		$query->execute();
		return $query;
	}
				
    public function readLabs(){
		$query= $this->dbconn->prepare("SELECT * FROM labs");
		$query->execute();
		return $query;
	}

	


	public function addUser($names, $username, $phone, $email, $upass) {
		$sql= "INSERT INTO user VALUES (null, '".$names."', '".$username."', '".$phone."', '".$email."', '".$upass."')";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
	}
    public function readUsers(){
		$query= $this->dbconn->prepare("SELECT * FROM user");
		$query->execute();
		return $query;
	}

    public function deleteUser($uid){
		$query= $this->dbconn->prepare("DELETE FROM user WHERE u_id='".$uid."' ");
		$query->execute();
		return $query;
	}

    public function readOneUser($uid){
		$query= $this->dbconn->prepare("SELECT * FROM user WHERE u_id='".$uid."' ");
		$query->execute();
		return $query;
	}

	public function updateUser($names, $uname, $ph, $email, $pass, $uid) {
		$sql= "UPDATE user SET u_names ='".$names."', u_username='".$uname."', u_phone='".$ph."', u_email='".$email."' u_password= '".$pass."' WHERE u_id='".$uid."' ";
		$query= $this->dbconn->prepare($sql);
		$query->execute();
		$count= $query->rowCount();
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