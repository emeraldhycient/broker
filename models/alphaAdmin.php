<?php
require_once("__connection.php");

class alphaAdmin extends DbConnect{

    public static function allRegistered(){
        $data = [];
        $sql = "select * from  credentials";
        $query = self::$connection->query($sql);
        if($query){            
            if($query->num_rows > 0){
                     while ($row = $query->fetch_object()) {
                         $data["status"] = "success";
                         $data[$row->id] = array(
                             "id" => $row->id,
                             "userid" => $row->userid,
                             "email" => $row->Email,
                              "Fname" => $row->Fname,
                              "Lname" => $row->Lname,
                              "date_joined" => $row->joinedOn
                         );
                     }
            }else{
                $data = [
                    "status" => "failed",
                    "error" => "no data found"
                ];
            }
        }else {
            $data = [
                "error" => self::$connection->error,
                "status" => "failed"
            ];
        }

        echo json_encode($data);
    }

    public static function totalInvestments(){
        $data = [];
        $sql = "SELECT SUM(amount) FROM transactions";
        $query = self::$connection->query($sql);
        if($query){
            if($query->num_rows > 0){
                $row = $query->fetch_row();
                $data = [
                    "status" => "success",
                    "totalInvestments" => $row[0]
                ];
            }else{
                $data = [
                    "status" => "failed",
                    "message" => "no data found"
                ];
            }
        }else{
              $data = [
                  "message" => self::$connection->error,
                  "status" => "failed"
              ];
        }

        echo json_encode($data);

    }

    public static function allInvestment(){
        $sql = "SELECT * FROM credentials JOIN transactions ON credentials.userid = transactions.userid";
        $query = self::$connection->query($sql);
        if($query){
            if($query->num_rows > 0){
                while ($row = $query->fetch_object()) {
                                $data["status"] = "success";
                                $data[$row->id] = array(
                                    "id" => $row->id,
                                    "userid" => $row->userid,
                                    "email" => $row->Email,
                                    "username" => $row->Fname." ".$row->Lname,
                                    "transaction_id" => $row->transaction_id,
                                     "amount" => $row->amount,
                                     "date" => $row->date
                                );

                }
       }else{
        $data = [
            "status" => "failed",
            "message" => "no data found in query one"
        ];
       }
        }else{
            $data = [
                "message" => self::$connection->error,
                "status" => "failed"
            ];       
         }
            echo json_encode($data);
    }

    public static function fetchScreenshot(){
        $data = [];
        $sql = "SELECT * FROM approvePayment";
        $query = self::$connection->query($sql);
        if($query){
                 while($row = $query->fetch_object()){
                   $data["status"] = "sucsess";
                    $data[$row->id] = array(
                          "id" => $row->id,
                          "userid" => $row->userId,
                          "screenshot" => $row->screenshot,
                          "status" => $row->status,
                          "submittedOn" => $row->SubmittedOn
                    );
                 }
        }else{
          $data = array(
            "status" => "failed",
            "message" => "unable to perform query<br>".self::$connection->error
          );
        }
        return json_encode($data);
  }

  public static function approvePayment($userId,$tx_ref,$amount){
      $data = [];

        $userId = self::filter($userId);
        $tx_ref = self::filter($tx_ref);
        $amount = self::filter($amount);

        if(isset($_SESSION["logged"])){
            $sql = "INSERT INTO transactions (userid,transaction_id,amount) VALUES ('$userId','$tx_ref','$amount')";
            $query = self::$connection->query($sql);
            if($query){
                     $data = [
                      "status" => "success",
                      "message" => "payment successful"
                     ];
            }else{
                 $data = [
                   "status" => "failed",
                   "message" => self::$connection->error
                 ];
            }
          }else{
            $data = [
              "status" => "failed",
              "message" => "you must be logged in to be able to access this function"
            ];
          }

      return json_encode($data);
  }
  

}