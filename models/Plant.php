

<?php


class Bed
{
    //DB Stuff
    private $conn;
    //Constructor to DB    

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getBeds()
    {

        $query = "SELECT * FROM bed";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute(array());

        return $stmt;
    }

    //Add  
    public function add(
        $Name, 
        $LocationId, 
        $Quantity, 
        $CreateUserId, 
        $ModifyUserId, 
        $StatusId
    ) {
        $query = "INSERT INTO bed (
                                    BedId, 
                                    Name, 
                                    LocationId, 
                                    Quantity, 
                                    CreateUserId, 
                                    ModifyUserId, 
                                    StatusId

                                        )
                    VALUES (UUID(),?, ?, ?, ?, ?,?)           
                   ";
        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $Name, 
                $LocationId, 
                $Quantity, 
                $CreateUserId, 
                $ModifyUserId, 
                $StatusId
            ))) {
                return true;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    //update  
    public function update(
        $QuiID
    ) {
        $query = "UPDATE documents SET Status = ? Where QuiID=? ";
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute(array(2, $QuiID));
        } catch (Exception $e) {
            return $e;
        }
    }

 
}