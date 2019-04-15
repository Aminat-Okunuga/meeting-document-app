<?php

class Meeting
{
    //properties
    private $db;
    private $meetingId;
    private $meetingNumber;
    private $meetingDate;
    private $meetingVenue;
    private $meetingStatus;
    private $per_page;
    private $document_id;
    private $dateCreated = "date(now())";


    function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addMeeting($meetingNumber, $meetingDate, $meetingVenue)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO meetings (meeting_number, meeting_date, meeting_venue) VALUES (:meetingNumber, :meetingDate, :meetingVenue)");

           $stmt->bindParam(":meetingNumber", $meetingNumber);
           $stmt->bindParam(":meetingDate", $meetingDate);
           $stmt->bindParam(":meetingVenue", $meetingVenue);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }

    }

    public function deleteMeeting($meetingId)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM meetings WHERE meeting_id =:meetingId");

            $stmt->bindParam(":meetingId", $meetingId);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function updateMeeting($meetingId, $meetingNumber, $meetingDate, $meetingVenue)
    {
        try {
            $stmt = $this->db->prepare("UPDATE meetings SET meeting_number = :meetingNumber, meeting_date = :meetingDate, meeting_venue = :meetingVenue WHERE meeting_id =:meetingId");

            $stmt->bindParam(":meetingId", $meetingId);
            $stmt->bindParam(":meetingNumber", $meetingNumber);
            $stmt->bindParam(":meetingDate", $meetingDate);
            $stmt->bindParam(":meetingVenue", $meetingVenue);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function approveMeeting($meetingId, $meetingStatus="1")
    {
        try {
            $stmt = $this->db->prepare("UPDATE meetings SET meeting_status = :meetingStatus WHERE meeting_id =:meetingId");

            $stmt->bindParam(":meetingStatus", $meetingStatus);
            $stmt->bindParam(":meetingId", $meetingId);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function disapproveMeeting($meetingId, $meetingStatus="2")
    {
        try {
            $stmt = $this->db->prepare("UPDATE meetings SET meeting_status =:meetingStatus WHERE meeting_id =:meetingId");

            $stmt->bindParam(":meetingStatus", $meetingStatus);
            $stmt->bindParam(":meetingId", $meetingId);
            $stmt->execute();

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }


    public function getApprovedMeetings($meetingStatus='1')
    {
        try {
            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;

            $stmt = $this->db->prepare("SELECT * FROM meetings WHERE meeting_status = :meetingStatus ORDER BY meeting_id LIMIT $page_1, $per_page");
            $stmt->bindParam(":meetingStatus", $meetingStatus);
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

    public function getDisapprovedMeetings($meetingStatus="2")
    {
        try {
            if(isset($_GET['page'])){

                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $per_page = 2;
            $page_1 = ($page * $per_page) - $per_page;

            $stmt = $this->db->prepare("SELECT * FROM meeting WHERE meeting_status = :meetingStatus ORDER BY meeting_id LIMIT $page_1, $per_page");
            $stmt->bindParam(":meetingStatus", $meetingStatus);
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

    public function getMeetings()
    {
        try {
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $per_page = 4;
            $page_1 = ($page * $per_page) - $per_page;

            //$page = offset $per_page = Number of items.
            $stmt = $this->db->prepare("SELECT * FROM meetings ORDER BY meeting_id LIMIT $page, $per_page");
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

    public function getCurrentMeeting($dateCreated, $meetingId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM meetings WHERE date_created =:dateCreated AND meeting_id =:meetingId");
            $stmt->execute(array(":dateCreated" => $dateCreated));
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


    public function getMeetingDocument($document_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document JOIN meetings WHERE document_id =:document_id");
            $stmt->execute(array(":document_id" => $document_id));

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

    public function getMeetingDocuments($document_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM document JOIN meetings WHERE document_id =:document_id");
            $stmt->execute(array(":document_id" => $document_id));

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

    public function setMeeting($meetingId)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM meetings WHERE meeting_id=:meetingId");
            $stmt->execute(array(":meetingId" => $meetingId));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->setMeetingId($result['meeting_id']);
            $this->setMeetingNumber($result['meeting_number']);
            $this->setMeetingDate($result['meeting_date']);
            $this->setMeetingVenue($result['meeting_venue']);

            return true;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function setMeetingId($meetingId)
    {
        $this->meetingId = $meetingId;
    }

    public function getMeetingId()
    {
        return $this->meetingId;
    }

    public function setMeetingNumber($meetingNumber)
    {
        $this->meetingNumber = $meetingNumber;
    }

    public function getMeetingNumber()
    {
        return $this->meetingNumber;
    }

    public function setDocumentId($document_id)
    {
        $this->document_id = $document_id;
    }

    public function getDocumentId()
    {
        return $this->document_id;
    }

    /**
     * @return mixed
     */
    public function getMeetingDate()
    {
        return $this->meetingDate;
    }

    /**
     * @param mixed $meetingDate
     */
    public function setMeetingDate($meetingDate)
    {
        $this->meetingDate = $meetingDate;
    }

    /**
     * @return mixed
     */
    public function getMeetingVenue()
    {
        return $this->meetingVenue;
    }

    /**
     * @param mixed $meetingVenue
     */
    public function setMeetingVenue($meetingVenue)
    {
        $this->meetingVenue = $meetingVenue;
    }
    public function getPerPage()
    {
        return $this->per_page;
    }
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }
    public function getMeetingStatus()
    {
        return $this->meetingStatus;
    }

    public function setMeetingStatus($meetingStatus)
    {
        $this->meetingStatus = $meetingStatus;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    


}
?>