<?php

class Member
{
    //properties
    private $db;
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $otherName;
    private $lastName;
    private $departmentId;
    private $positionId;
    private $rankId;
    private $collegeId;
    private $phoneNumber;
    private $per_page;
    private $memberStatus;
    private $email;


//    const UNREGISTEREDMEMBER = '0';
//    const REGISTEREDMEMBER = '1';

    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addMember($username, $password, $firstName, $otherName, $lastName, $departmentId, $collegeId, $positionId, $rankId,
                              $phoneNumber, $email, $memberStatus)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO member (username, password, first_name, other_name, last_name, department_id, college_id,
position_id, rank_id, phone_number, email, member_status) 
 VALUES(:username, :password, :firstName, :otherName, :lastName, :departmentId, :collegeId, :positionId, :rankId, :phoneNumber, :email, :memberStatus)");

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":otherName", $otherName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":departmentId", $departmentId);
            $stmt->bindParam(":collegeId", $collegeId);
            $stmt->bindParam(":positionId", $positionId);
            $stmt->bindParam(":rankId", $rankId);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":memberStatus", $memberStatus);

            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function deleteMember($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM member WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function updateMember($id, $username, $password, $firstName, $otherName, $lastName, $departmentId, $collegeId, $positionId, $rankId,
                                 $phoneNumber, $email)
    {
        try {
            $stmt = $this->db->prepare("UPDATE member SET username =:username, password =:password, first_name =:firstName, other_name =:otherName,
 last_name =:lastName, department_id =:departmentId, college_id =:collegeId, position_id =:positionId, rank_id =:rankId, phone_number =:phoneNumber, email =:email, member_status =:memberStatus WHERE id =:id");

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":firstName", $firstName);
            $stmt->bindParam(":otherName", $otherName);
            $stmt->bindParam(":lastName", $lastName);
            $stmt->bindParam(":collegeId", $collegeId);
            $stmt->bindParam(":departmentId", $departmentId);
            $stmt->bindParam(":positionId", $positionId);
            $stmt->bindParam(":rankId", $rankId);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":memberStatus", $memberStatus);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function approveMember($id, $memberStatus="1")
    {
        try {
            $stmt = $this->db->prepare("UPDATE member SET member_status = :memberStatus WHERE id =:id");

            $stmt->bindParam(":memberStatus", $memberStatus);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function disapproveMember($id, $memberStatus="2")
    {
        try {
            $stmt = $this->db->prepare("UPDATE member SET member_status = :memberStatus WHERE id =:id");

            $stmt->bindParam(":memberStatus", $memberStatus);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function getMember()
    {
        try {
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $per_page = 2;
            $stmt = $this->db->prepare("SELECT * FROM member ORDER BY first_name LIMIT $page, $per_page");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            } else {
                $result = "";
            }
            return $result;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }

    }

    public function getDepartmentMember($departmentId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM member WHERE department_id = :departmentId ORDER BY first_name");
            $stmt->execute(array(":departmentId" => $departmentId));

            if ($stmt->rowCount() > 0) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            } else {
                $result = "";
            }
            return $result;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }

    }

    public function getDeptMember($departmentId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM member WHERE department_id = :departmentId");
            $stmt->execute(array(":departmentId" => $departmentId));

            if ($stmt->rowCount() > 0) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            } else {
                $result = "";
            }
            return $result;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }

    }

    public function getCollegeMember($collegeId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM member WHERE college_id = :collegeId");
            $stmt->execute(array(":collegeId" => $collegeId));

            if ($stmt->rowCount() > 0) {
                $result = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            } else {
                $result = "";
            }
            return $result;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }

    }

    public function setMember($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM member WHERE id=:id");
            $stmt->execute(array(":id" => $id));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
            $this->setUserName($result['username']);
            $this->setPassword($result['password']);
            $this->setFirstName($result['first_name']);
            $this->setOtherName($result['other_name']);
            $this->setLastName($result['last_name']);
            $this->setCollegeId($result['college_id']);
            $this->setDepartmentId($result['department_id']);
            $this->setPositionId($result['position_id']);
            $this->setRankId($result['rank_id']);
            $this->setPhoneNumber($result['phone_number']);
            $this->setEmail($result['email']);
            $this->setMemberStatus($result['member_status']);


            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function signInMember($username, $password, $email, $memberStatus)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM member WHERE username =:username OR email =:email AND password =:password AND member_status =:memberStatus LIMIT 1");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":member_status", $memberStatus);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->setId($result['id']);
                $this->setPositionId($result['position_id']);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUserName($username)
    {
        $this->username = $username;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setOtherName($otherName)
    {
        $this->otherName = $otherName;
    }

    public function getOtherName()
    {
        return $this->otherName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setCollegeId($collegeId)
    {
        $this->collegeId = $collegeId;
    }

    public function getCollegeId()
    {
        return $this->collegeId;
    }

    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    public function setPositionId($positionId)
    {
        $this->positionId = $positionId;
    }

    public function getPositionId()
    {
        return $this->positionId;
    }

    public function setRankId($rankId)
    {
        $this->rankId = $rankId;
    }

    public function getRankId()
    {
        return $this->rankId;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
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
    /**
     * @return mixed
     */
    public function getMemberStatus()
    {
        return $this->memberStatus;
    }
    /**
     * @param mixed $memberStatus
     */
    public function setMemberStatus($memberStatus)
    {
        $this->memberStatus = $memberStatus;
    }

}