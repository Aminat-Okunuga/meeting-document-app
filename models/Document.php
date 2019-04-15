<?php

class Document
{
    //properties
    private $db;
    private $id;
    private $documentTitle;
    private $documentName;
    private $documentStatus;
    private $collegeId;
    private $meetingId;
    private $per_page;
    private $dateUploaded = "date(now())";

    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function uploadDocument($documentTitle, $documentName, $collegeId, $meetingId, $dateUploaded)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO document (document_title, document_name, college_id, meeting_id, date_uploaded) VALUES (:documentTitle, :documentName, :collegeId, :meetingId, :dateUploaded)");
            $stmt->bindParam(":documentTitle", $documentTitle);
            $stmt->bindParam(":documentName", $documentName);
            $stmt->bindParam(":meetingId", $meetingId);
            $stmt->bindParam(":collegeId", $collegeId);
            $stmt->bindParam(":dateUploaded", $dateUploaded);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }


    public function getPendingDocuments($documentStatus="0")
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

    public function approveDocument($id, $documentStatus="1")
    {
        try {
            $stmt = $this->db->prepare("UPDATE document SET document_status = :documentStatus WHERE id =:id");

            $stmt->bindParam(":documentStatus", $documentStatus);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function disapproveDocument($id, $documentStatus="2")
    {
        try {
            $stmt = $this->db->prepare("UPDATE document SET document_status = :documentStatus WHERE id =:id");

            $stmt->bindParam(":documentStatus", $documentStatus);
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
            $per_page = 4;
            return $per_page;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return "";
        }
    }


    public function getApprovedDocuments($documentStatus='1')
    {
        try {
            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $per_page = 4;
            $page_1 = ($page * $per_page) - $per_page;

            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus ORDER BY id LIMIT $page_1, $per_page");
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

    public function getDisapprovedDocuments($documentStatus="2")
    {
        try {
            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;

            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = :documentStatus ORDER BY id LIMIT $page_1, $per_page");
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

    public function deleteDocument($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM document WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function deleteUserDocument($id, $documentStatus = "3")
    {
        try {
            $stmt = $this->db->prepare("UPDATE document SET document_status =:documentStatus WHERE id =:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":documentStatus", $documentStatus);

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }


    public function getDocuments()
    {
        try {
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $per_page = 5; //number of items per page
            $page_1 = ($page * $per_page) - $per_page;

            //$page = offset $per_page = Number of items.
            $stmt = $this->db->prepare("SELECT * FROM document ORDER BY document_title LIMIT $page, $per_page");
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

    public function getCollegeDocument($collegeId)
    {
        try {
              $stmt = $this->db->prepare("SELECT * FROM document WHERE college_id=:collegeId");
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

    public function getCollegeDocumentNumber($collegeId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE college_id =:collegeId");
            $stmt->execute(array(":collegeId" => $collegeId));

            return $stmt->rowCount();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getApprovedCollegeDocuments($collegeId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = 1 AND college_id = :collegeId ORDER BY id");
            $stmt->bindParam(":collegeId", $collegeId);
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


    public function getCollegeApproveDocumentNumber($collegeId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE college_id =:collegeId AND document_status =1");
            $stmt->execute(array(":collegeId" => $collegeId));

            return $stmt->rowCount();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }


    //FOR A PARTICULAR MEETING DOCUMENT
    public function getMeetingDocument($meetingId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE meeting_id=:meetingId");
            $stmt->execute(array(":meetingId" => $meetingId));

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


    public function meetingDocumentNumber($meetingId, $documentStatus = "1")
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE meeting_id =:meetingId AND document_status =:documentStatus");
            $stmt->execute(array(":meetingId" => $meetingId));
            $stmt->execute(array(":documentStatus" => $documentStatus));

            return $stmt->rowCount();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }


    public function getApprovedMeetingDocumentNumber($meetingId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE meeting_id =:meetingId AND document_status =1");
            $stmt->execute(array(":meetingId" => $meetingId));

            return $stmt->rowCount();

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }

    public function getApprovedMeetingDocuments($meetingId)
    {
        try {

            $stmt = $this->db->prepare("SELECT * FROM document WHERE document_status = 1 AND meeting_id = :meetingId ORDER BY id");
            $stmt->bindParam(":meetingId", $meetingId);
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


    function searchResult($data)
    {
        $result = array();
        try {
            $stmt = $this->db->prepare("SELECT * FROM document WHERE name LIKE ':data'");
            $dataValue = '%'.$data.'%';
            $stmt->bindParam(':data', $dataValue);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
                }
            }
            return $result;

        }catch (PDOException $ex) {
            echo $ex->getMessage();
            return $result;
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

    public function setDocumentTitle($documentTitle)
    {
        $this->documentTitle = $documentTitle;
    }

    public function getDocumentTitle()
    {
        return $this->documentTitle;
    }

    public function setDocumentName($documentName)
    {
        $this->documentName = $documentName;
    }

    public function getDocumentName()
    {
        return $this->documentName;
    }

    public function setDocumentStatus($documentStatus)
    {
        $this->documentStatus = $documentStatus;
    }

    public function getDocumentStatus()
    {
        return $this->documentStatus;
    }
    public  function setCollegeId($collegeId)
    {
        $this->collegeId = $collegeId;
    }
    public function getCollegeId()
    {
        return $this->collegeId;
    }
    public  function setMeetingId($meetingId)
    {
        $this->meetingId = $meetingId;
    }
    public function getMeetingId()
    {
        return $this->meetingId;
    }
    public  function setDateUploaded($dateUploaded)
    {
        $this->dateUploaded = $dateUploaded;
    }
    public function getDateUploaded()
    {
        return $this->dateUploaded;
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
}

