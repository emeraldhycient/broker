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
        $sql = "SELECT * FROM approvePayment ORDER BY id DESC";
        $query = self::$connection->query($sql);
        if($query){
                 while($row = $query->fetch_object()){
                   $data["status"] = "success";
                    $data[$row->id] = array(
                          "id" => $row->id,
                          "userid" => $row->userId,
                          "screenshot" => $row->screenshot,
                          "status" => $row->statuz,
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

  public static  function fetchSingleScreenshot($proveid){
      $data  = [];
      
    $proveid = self::filter($proveid);

    $sql = "SELECT * FROM approvePayment WHERE id =$proveid";
    $query = self::$connection->query($sql);
    if($query){
               if($query->num_rows > 0 ){
                       $row = $query->fetch_object();
                       $data["status"] = "success";
                       $data['data'] = array(
                             "id" => $row->id,
                             "userid" => $row->userId,
                             "screenshot" => $row->screenshot,
                             "status" => $row->statuz,
                             "submittedOn" => $row->SubmittedOn
                       );
               }else{
                $data = array(
                    "status" => "failed",
                    "message" => "no data with  such id found"
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

  public static function approvePayment($userId,$tx_ref,$amount,$proveid){
      $data = [];

        $proveid = self::filter($proveid);
        $userId = self::filter($userId);
        $tx_ref = self::filter($tx_ref);
        $amount = self::filter($amount);
            
            $sql = "INSERT INTO transactions (userid,transaction_id,amount) VALUES ('$userId','$tx_ref','$amount')";

            $sql2 = "UPDATE approvePayment SET statuz = 'answered' WHERE id='$proveid'";
            
            $query = self::$connection->query($sql);
            $query2 = self::$connection->query($sql2);
            if($query){
                
                if($query2){
                
                    $data = [
                     "status" => "success",
                     "message" => "payment approved"
                    ];
           }else{
                $data = [
                  "status" => "failed 2",
                  "message" => self::$connection->error
                ];
           }
            }else{
                 $data = [
                   "status" => "failed",
                   "message" => self::$connection->error
                 ];
            }
    
      return json_encode($data);
  }

   public static function insertWalletAddress($address)
  {
      $data = [];
      $walletAddress = self::filter($address);
      $sql = "UPDATE bitcoin SET walletaddress='$walletAddress' WHERE id = 1 ";
      $query = self::$connection->query($sql);
      if($query){
                
        $data = [
         "status" => "success",
         "message" => "wallet updated successful"
        ];
        }else{
            $data = [
            "status" => "failed",
            "message" => self::$connection->error
            ];
        }

        return json_encode($data);
}

public static function insertBitcoinPrice($price)
{
    $price = self::filter($price);

    $data = [];
    $sql = "UPDATE bitcoin SET btcprice='$price' WHERE id=1 ";
    $query = self::$connection->query($sql);
    if($query){
              
      $data = [
       "status" => "success",
       "message" => "bitcoin price  updated successful"
      ];
      }else{
          $data = [
          "status" => "failed",
          "message" => self::$connection->error
          ];
      }

      return json_encode($data);


}

public static function changeEmail($email)
{

    $data= [];
    $email = self::filter($email);
    $sql = "UPDATE alphaadmin SET email ='$email' WHERE id = 1 ";
    $query = self::$connection->query($sql);

    if($query){
              
        $data = [
         "status" => "success",
         "message" => "email  updated successful"
        ];
        }else{
            $data = [
            "status" => "failed",
            "message" => self::$connection->error
            ];
        }
    return json_encode($data);

}


public static function login($email,$password){
    $data = [];

    $email = self::filter($email);
    $password = self::filter($password);
    $sql = "SELECT * FROM alphaadmin WHERE Email ='$email' ";
    $query = self::$connection->query($sql);

    if($query){

     if($query->num_rows > 0){

       while($row = $query->fetch_object()){
           if(password_verify($password,$row->pass)){

             $_SESSION["logged"] = $row->userid;
             $_SESSION["username"] = $row->Fname ."-" .$row->Lname;
             
             $data = array(
               "status" => "success",
               "message" => "logged in"
             );
      

           }else{
             
             $data = array(
               "status" => "failed",
               "message" => "wrong details"
             );
      

           }
       }

     }else{

       $data = array(
         "status" => "failed",
         "message" => "no user found"
       );

     }
    }else{

      $data = array(
        "status" => "failed",
        "message" => self::$connection->error
      );

    }
    
    return json_encode($data);

  }

  public static function logout(){
    if(session_destroy()){
         return json_encode(array("status" => "success"));
    }else{
         return json_encode(array("status" => "failed"));
    }
  }
  

}