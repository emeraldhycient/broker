<?php
include_once "__connection.php";

class Entry extends DbConnect {

  public static function fetchAllDeposit(){
    $id = $_SESSION["logged"];
    $data = [];
     $sql = "SELECT * FROM transactions WHERE userid='$id'";
     $query = self::$connection->query($sql);
     if($query){
       while($row = $query->fetch_object()){
         $data["status"] = "success";
         $data["alldeposit"][$row->id ] = array(
           "tx_ref" => $row->transaction_id,
           "amount" => $row->amount,
           "date" =>$row->date
         );
        }
     }else{
      $data = [
        "status" => "failed",
        "message" => self::$connection->error
      ];
     }
     return json_encode($data);
  }

public static function totalDeposit(){
  $id = $_SESSION["logged"];
  $data = [];
   $sql = "SELECT SUM(amount) FROM transactions WHERE userid='$id'";
   $query = self::$connection->query($sql);
   if($query){
     $row = $query->fetch_row();
       $data = [
         "status" => "success",
         "allDeposit" => $row[0]
       ];
   }else{
    $data = [
      "status" => "failed",
      "allDeposit" => 00.00
    ];
   }
   return json_encode($data);
}

public static function fetchScreenshot(){
      $data = [];
      $id = $_SESSION["logged"];
      $sql = "SELECT * FROM approvePayment WHERE userId='$id' ORDER BY id DESC";
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

public static function insertScreenshot($img){
           $data = [];
           $id = $_SESSION["logged"];
           if(!empty($img)){
            $ext = pathinfo($img["name"],PATHINFO_EXTENSION);
             $genName = self::generateName().".".$ext;
             $path = "../asset/photos/".$genName;
            if(move_uploaded_file($img["tmp_name"],$path)){
                  $sql = "INSERT INTO approvePayment (userId,screenshot,statuz) VALUES ('$id','$genName','pending')";
                  $query = self::$connection->query($sql);
                  if($query){
                    $data = array(
                      "status" => "success",
                      "message" => "image uploaded successfully",
                      "imageName" => $img["name"]
                    );
                  }else {
                    $data = array(
                      "status" => "failed",
                      "message" => "unable to perform query<br>".self::$connection->error
                    );
                  }
            }else{
              $data = array(
                "status" => "failed",
                "message" => "unable to move image"
              );
            }
          }else{
              $data = array(
                "status" => "failed",
                "message" => "image is empty"
              );
         }
         return json_encode($data);
}

  public static function insertPayment($tx_ref,$amount){
    $data = [];
    if(isset($_SESSION["logged"])){
    $id = $_SESSION["logged"];
    $tx_ref = self::filter($tx_ref);
    $amount = self::filter($amount);
    $sql = "INSERT INTO transactions (userid,transaction_id,amount) VALUES ('$id','$tx_ref','$amount')";
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

  public static function details(){
    $data= [];
    $id = $_SESSION["logged"];
    $sql = "SELECT * FROM credentials WHERE userid ='$id'";
    $query = self::$connection->query($sql);
    if($query->num_rows > 0){
        while($row = $query->fetch_object()){
        $data = [
          "email" => $row->Email,
          "phone_number" => "",
            "name" => $row->Fname.""."".$row->Lname
        ];
    }
    }else{
        $data = [
           "message" => "error"
        ];
    }
    return json_encode($data);
}

   public static function login($email,$password){
     $data = [];

     $email = self::filter($email);
     $password = self::filter($password);
     $sql = "SELECT * FROM credentials WHERE Email ='$email' ";
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

   public static function register($fname,$lname,$email,$password){
       $Fname = self::filter($fname);
       $Lname= self::filter($lname);
       $Email = self::filter($email);
       $Password = self::filter($password);
       $userid = uniqid();
         $data = [];
         $pass = password_hash($Password,PASSWORD_BCRYPT);
            $sql = "INSERT INTO credentials (Fname,Lname,Email,Pass,userid) VALUES ('$Fname','$Lname','$Email','$pass','$userid')";
            $query = self::$connection->query($sql);
            if($query){
              $_SESSION["logged"] = $userid;
              $_SESSION["username"] = $Fname."-".$lname;
              $data["status"] = "success";
              $data["message"] = "account created";
            }else{
              $data["status"] = "failed";
              $data["message"] = self::$connection->error;
            }
       
      return json_encode($data);
   }

   public static function btcdetails(){
    $data = [];
    $sql = "SELECT *  FROM bitcoin";
    $query = self::$connection->query($sql);
    if($query){
      if($query->num_rows > 0){
        while($row = $query->fetch_object()){
          $data["status"] = "success";
          $data["data"] = array(
            "btcprice" => $row->btcprice,
            "walletaddress" => $row->walletaddress
          );
        }
      }else{
        $data["status"] = "failed";
        $data["message"] = "no data found";
      }
    }else{
      $data["status"] = "failed";
      $data["message"] = self::$connection->error;
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