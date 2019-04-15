<?php
	class Department{
		//properties
		private $db;
		private $id;
		private $name;
		private $per_page;
		private $collegeId;



		function __construct(){
			$database = new Database();
			$this->db = $database->getConnection();
		}

		public function addDepartment($name,$collegeId){
			try{
				$stmt = $this->db->prepare("INSERT INTO department (name,college_id) VALUES (:name,:collegeId)");

				$stmt->bindParam(":name",$name);
				$stmt->bindParam(":collegeId",$collegeId);
				$stmt->execute();

				return true;

			}catch(PDOException $ex){
				echo $ex->getMessage();
				return false;
			}

		}

    public function deleteDepartment($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM department WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

		public function updateDepartment($id,$collegeId,$name){
			try{
				$stmt = $this->db->prepare("UPDATE department SET name = :name, college_id = :collegeId WHERE id =:id");

                $stmt->bindParam(":name",$name);
                $stmt->bindParam(":collegeId",$collegeId);
				$stmt->bindParam(":id",$id);
				$stmt->execute();

				return true;

			}catch(PDOException $ex){
				echo $ex->getMessage();
				return false;
			}
		}



		public function getDepartments(){
			try{

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $per_page = 2;
				$stmt = $this->db->prepare("SELECT * FROM department ORDER BY name Limit $page, $per_page");
				$stmt->execute();

				if($stmt->rowCount() > 0){
					$result = array();
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						$result[] = $row;
					}
				}else{
					$result = "";
				}
				return $result;

			}catch(PDOException $ex){
				echo $ex->getMessage();
				return "";
			}
		}


		public function setDepartment($id){
			try{
				$stmt = $this->db->prepare("SELECT * FROM department WHERE id=:id");
				$stmt->execute(array(":id"=>$id));

				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$this->setId($result['id']);
                $this->setName($result['name']);
                $this->setCollegeId($result['college_id']);
				
				return true;

			}catch(PDOException $ex){
				echo $ex->getMessage();
				return false;
			}
		}

        public function getCollegeDepartment($collegeId)
        {
            try {
                $stmt = $this->db->prepare("SELECT * FROM department WHERE college_id=:collegeId");
                $stmt->execute(array(":collegeId" => $collegeId));

                if($stmt->rowCount() > 0){
                    $result = array();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $result[] = $row;
                    }
                }else{
                    $result = "";
                }
                return $result;

            }catch(PDOException $ex){
                echo $ex->getMessage();
                return "";
            }
        }

        public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this->id;
		}
        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
        public function setCollegeId($collegeId){
            $this->collegeId = $collegeId;
        }
        public function getCollegeId(){
            return $this->collegeId;
        }

        /**
         * @return mixed
         */
        public function getPerPage()
        {
            return $this->per_page;
        }

        /**
         * @param mixed $per_page
         */
        public function setPerPage($per_page)
        {
            $this->per_page = $per_page;
        }

	}

?>