<?php 
    include __DIR__ . "/../config.php";

    class Shopping{
        private $servername = DB_SERVER;
		private $username   = DB_USERNAME;
		private $password   = DB_PASSWORD;
		private $database   = DB_NAME;
		public  $con;
        
        // DB Connection 
        public function __construct(){
            $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
            if ($this->con->connect_error) {
                echo "Failed to connect to MySQL: " . $this->con->connect_error;
                exit();
            }
        }

        // Insert data into table
		public function insert($post){
			$item_name = $this->con->real_escape_string($_POST['item_name']);
			$query = "INSERT INTO shopping_list (name) VALUES('$item_name')";
			$sql = $this->con->query($query);
			if ($sql == true) {
			    header("Location: ". BASE_URL ."index.php?msg=insert");
			}else{
                header("location: error.php");
			    //echo "Adding item failed, please try again!";
			}
		}		
        
        // Fetch records to show show
		public function show(){
		    $query = "SELECT * FROM shopping_list where deleted_at is null order by id desc";
		    $result = $this->con->query($query);
		    if($result->num_rows > 0) {
		        $data = array();
		        while($row = $result->fetch_assoc()) {
		            $data[] = $row;
		        }
			    return $data;
		    }else{
				echo false;
		    }
		}
        
        // Fetch single record for edit
		public function getRecordById($id){
		    $query = "SELECT * FROM shopping_list WHERE id = '$id'";
		    $result = $this->con->query($query);
		    if ($result->num_rows > 0) {
			    $row = $result->fetch_assoc();
			    return $row;
		    }else{
				header("location: error.php");
		    }
		}
        
        // Update data 
		public function updateRecord($postData){
            $item_name = $this->con->real_escape_string($_POST['item_name']);
		    $id = $this->con->real_escape_string($_POST['id']);
		    if(!empty($id) && !empty($postData)) {
			    $query = "UPDATE shopping_list 
                        SET 
                        name = '$item_name' 
                        WHERE id = '$id'";
			    $sql = $this->con->query($query);
			    if($sql == true) {

			        header("Location:". BASE_URL ."index.php?msg=update");
                }else{
					header("location: error.php");
                }
		    }
		}
		// Soft delete data
		public function deleteRecord($id){
            $date = date("Y-m-d H:i:s");
		    //$query = "DELETE FROM shopping_list WHERE id = '$id'";
		    $query = "UPDATE shopping_list SET deleted_at = '$date' WHERE id = '$id'";
            $sql = $this->con->query($query);
		    if ($sql==true) {
                echo "success";
		    }else{
                echo "fail";
		    }
		}

        // Update record status 
		public function updateRecordStatus($postData){
            $status = $this->con->real_escape_string($_POST['status']);
		    $id = $this->con->real_escape_string($_POST['editId']);
            $st = ($status === "check") ? 1 : 0;
            if(!empty($id) && !empty($postData)) {
			    $query = "UPDATE shopping_list 
                        SET 
                        status = '$st' 
                        WHERE id = '$id'";
			    $sql = $this->con->query($query);
			    if($sql == true) {
                    echo 'success';
			        //header("Location:index.php?msg=update");
                }else{
                    echo 'fail';
                }
		    }
		}

    }
?>