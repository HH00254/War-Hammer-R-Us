<?php 

class Login extends Dbh
{

    protected function getUser($uid, $pwd)
    {
        $query = "SELECT users_pwd FROM users WHERE users_uid = :users_uid OR users_email = :users_email";
        $statement = $this->connect()->prepare($query);


        $statement->bindValue(':users_uid', trim($uid));
        $statement->bindValue(':users_email', strtolower(trim($uid)));

        // We now execute the selected command statement
        if (!$statement->execute()) 
        {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        if ($statement->rowCount() === 0)
        {
            $statement = null;
            header("location: ../index.php?error=1usernotfound");
            exit();
        }

        $pwd_hashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $check_pwd = password_verify($pwd, $pwd_hashed[0]["users_pwd"]);

        if (!$check_pwd)
        {
            $statement = null;
            header("location: ../index.php?error="  . $check_pwd . "wrongpassword");
            exit();
        }
        elseif ($check_pwd)
        {
            $user_info_query = "SELECT * FROM users WHERE  (users_uid = :users_uid OR users_email LIKE :users_email);";

            $statement = $this->connect()->prepare($user_info_query);

            $statement->bindValue(':users_uid', $uid);
            $statement->bindValue(':users_email', strtolower(trim($uid)));

            $statement->execute();

            if (!$statement->execute()) 
            {
                $statement = null;
                header("location: ../index.php?error=stmtfailed");
    
                exit();
            }

            if ($statement->rowCount() !== 1)
            {
                $count = $statement->rowCount();
                $statement = null;
                header("location: ../index.php?error=" . $count . '' . $uid ."usernotfound");
                exit();
            }

            $user =$statement->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $this->getUsersCityAndProvinceNames($user[0]["city_id"]);
            
            $_SESSION["user_id"] = $user[0]["user_id"];
            $_SESSION["users_uid"] = $user[0]["users_uid"];
            $_SESSION["user_first_name"] = $user[0]["user_first_name"];
            $_SESSION["user_last_name"] = $user[0]["user_last_name"];
            $_SESSION["users_email"] = $user[0]["users_email"];
            $_SESSION["user_address"] = $user[0]["user_address"];
            $_SESSION["postal_code"] = $user[0]["postal_code"];

            if (!isset($_COOKIE['user_log'])) {
                $user_log_duration = 
                    $user[0]["users_uid"] . "_" . (time() + 60 * 60 * 24 * 2);
                setcookie('user_log',  $user_log_duration, (time() + 60 * 60 * 24 * 2), '/');
            }

            $statement = null;
        } 
    }


    private function getUsersCityAndProvinceNames($user_data)
    {

        $query = "SELECT geo_cities.city_name, geo_provinces.province_name
         FROM geo_cities 
         INNER JOIN geo_provinces ON geo_cities.province_id = geo_provinces.province_id
         WHERE geo_cities.city_id = :user_data";

        $statement = $this->connect()->prepare($query);

        $statement->bindValue(':user_data', $user_data);

        $statement->execute();
        $address_data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["city_name"]     = $address_data[0]['city_name'];
        $_SESSION["province_name"] = $address_data[0]['province_name'];
    }
}