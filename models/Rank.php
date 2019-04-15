<?php

class Rank
{
    //properties
    private $db;
    private $id;
    private $name;


    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addRank($name)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO rank (name) VALUES (:name)");

            $stmt->bindParam(":name", $name);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function deleteRank($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM rank WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function updateRank($id, $name)
    {
        try {
            $stmt = $this->db->prepare("UPDATE rank SET name = :name WHERE id =:id");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function getRanks()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM rank ORDER BY id");
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

    public function setRank($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM rank WHERE id=:id");
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
}
?>