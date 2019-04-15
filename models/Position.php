<?php

class Position
{
    //properties
    private $db;
    private $id;
    private $name;
    private $alias;

    const REGISTRAR = 'registrar';
    const DIRECTOR = 'director';
    const DEAN = 'dean';
    const MEMBER = 'member';


    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addPosition($name)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO position (name) VALUES (:name)");

            $stmt->bindParam(":name", $name);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function deletePosition($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM position WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function updatePosition($id, $name)
    {
        try {
            $stmt = $this->db->prepare("UPDATE position SET name = :name WHERE id =:id");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function getPositions()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM position ORDER BY id");
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

    public function setPosition($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM position WHERE id=:id");
            $stmt->execute(array(":id" => $id));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
            $this->setName($result['name']);
            $this->setAlias($result['alias']);

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
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param mixed $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }


}