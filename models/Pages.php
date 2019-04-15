<?php

class Pages
{
    //properties
    private $db;
    private $id;
    private $page = "";
    private $per_page = 2;
    private $documentStatus;
    private $documentTitle;
    private $documentName;



    function __construct()
    {

        $database = new Database();
        $this->db = $database->getConnection();
    }


    public function getDocuments()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document ORDER BY document_title");
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

    public function getCollegePages()
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM college");
            $stmt->execute();
            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getDepartmentPages()
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM department");
            $stmt->execute();
            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }


    public function getMemberPages()
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM member");
            $stmt->execute();
            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getMeetingPages()
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM meetings");
            $stmt->execute();
            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }


    public function getPendingPages($documentStatus="0")
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus");
            $stmt->execute(array(":documentStatus" => $documentStatus));

            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getApprovedPages($documentStatus="1")
    {
        try {
            $page = "";
            $per_page = 4;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus");
            $stmt->execute(array(":documentStatus" => $documentStatus));

            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }


    public function getDiasapprovedPages($documentStatus="2")
    {
        try {
            $page = "";
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;
            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus");
            $stmt->execute(array(":documentStatus" => $documentStatus));

            return $stmt->rowCount();
            // return $count = ceil($stmt / $per_page);

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getAllDocumentPages()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document ORDER BY id");
         $stmt->execute();

            return $stmt->rowCount();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getApprovedDocuments($documentStatus='1')
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus ORDER BY id");
            $stmt->bindParam(":documentStatus", $documentStatus);
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

    public function setDocument($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE id=:id");
            $stmt->execute(array(":id" => $id));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
            $this->setDocumentTitle($result['document_title']);
            $this->setDocumentName($result['document_name']);

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }


//    public function getPages($documentStatus="1")
//    {
//        try {
//
//            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus LIKE '$documentStatus'");
//            $stmt->bindParam(":documentStatus", $documentStatus);
//            $stmt->execute();
//            $per_page = 2;
//
//            if ($stmt->rowCount() > 0) {
//                $result = array();
//
//                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//                    $result[] = $row;
//
//                    $stmt = ceil($stmt / $per_page);
//                }
//            } else {
//                $result = "";
//            }
//
//            return $result;
//
//        } catch (PDOException $ex) {
//            echo $ex->getMessage();
//            return "";
//        }
//
//    }
//

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setDocumentStatus($documentStatus)
    {
        $this->documentStatus = $documentStatus;
    }

    public function getDocumentStatus()
    {
        return $this->documentStatus;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    /**
     * @return mixed
     */
    public function getDocumentTitle()
    {
        return $this->documentTitle;
    }

    /**
     * @param mixed $documentTitle
     */
    public function setDocumentTitle($documentTitle)
    {
        $this->documentTitle = $documentTitle;
    }

    /**
     * @return mixed
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * @param mixed $documentName
     */
    public function setDocumentName($documentName)
    {
        $this->documentName = $documentName;
    }


}

?>