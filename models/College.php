<?php

class College
{
    //properties
    private $db;
    private $id;
    private $name;
    private $per_page;


    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

//    public function addCollege($name, $profilePath)
    public function addCollege($name)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO college (name) VALUES (:name)");

            $stmt->bindParam(":name", $name);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function deleteCollege($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM college WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function updateCollege($id, $name)
    {
        try {
            $stmt = $this->db->prepare("UPDATE college SET name = :name WHERE id =:id");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function PerPage()
    {
        try {
            $per_page = 2;
            return $per_page;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }

    }

    public function getColleges()
    {
        try {

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM college ORDER BY name LIMIT $page, $per_page");
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


    public function setCollege($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM college WHERE id=:id");
            $stmt->execute(array(":id" => $id));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
            $this->setName($result['name']);
            return true;

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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
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