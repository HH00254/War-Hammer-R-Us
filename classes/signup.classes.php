<?php 

class Signup extends Dbh
{
    // ($uid, $pwd, $email)
    protected function setUser($city_id,
                               $users_uid,
                               $user_first_name,
                               $user_last_name,
                               $users_email,
                               $user_address,
                               $postal_code,
                               $users_pwd,
                               $cardholder_name,
                               $card_number_token,
                               $expiration_date,
                               $notes,
                               $role_id)
    {  
                
        $query =
            "INSERT INTO users 
            (
                
                city_id, 
                users_uid, 
                user_first_name, 
                user_last_name, 
                users_email, 
                user_address, 
                registration_date, 
                users_pwd, 
                cardholder_name, 
                card_number_token, 
                expiration_date, 
                notes, 
                role_id,
                postal_code
            ) 
            VALUES 
            (
                :city_id, 
                :users_uid, 
                :user_first_name, 
                :user_last_name, 
                :users_email, 
                :user_address, 
                :time_stamp, 
                :users_pwd, 
                :cardholder_name, -- Assuming cardholder_name 
                :card_number_token, -- Assuming card_number_token 
                :expiration_date, -- Assuming expiration_date
                :notes, -- Assuming notes 
                :role_id, -- Assuming role_id 
                :postal_code
            )";

        $timestamp = time(); // Unix timestamp
        $humanReadable = date('Y-m-d H:i:s', $timestamp);

        $statement = $this->connect()->prepare($query);

        $hashed_pwd = password_hash($users_pwd, PASSWORD_DEFAULT);
        $city_code = $this->getCityCode($city_id)['city_id'];

        $statement->bindValue(':city_id', $city_code);
        $statement->bindValue(':users_uid', $users_uid);
        $statement->bindValue(':user_first_name', $user_first_name);
        $statement->bindValue(':user_last_name', $user_last_name);
        $statement->bindValue(':users_email', $users_email);
        $statement->bindValue(':user_address', $user_address);
        $statement->bindValue(':time_stamp', $humanReadable);
        $statement->bindValue(':users_pwd', $hashed_pwd);
        $statement->bindValue(':cardholder_name', $cardholder_name);
        $statement->bindValue(':card_number_token', $card_number_token);
        $statement->bindValue(':expiration_date', $expiration_date);
        $statement->bindValue(':notes', $notes);
        $statement->bindValue(':role_id', $role_id);
        $statement->bindValue(':postal_code', $postal_code);
        

        // We now execute the selected command statement
        if (!$statement->execute()) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        $statement = null;
    }

     protected function checkUser($users_uid, $users_email) 
     {
        $query = "SELECT users_uid FROM users WHERE users_uid = :users_uid OR users_email = :users_email";
        $statement = $this->connect()->prepare($query);

        $statement->bindValue(':users_uid', $users_uid);
        $statement->bindValue(':users_email', $users_email);

        // We now execute the selected command statement
        if (!$statement->execute()) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        $result_check = true;

        if ($statement->rowCount() > 0)
        {
            $result_check = false;
        }

        return $result_check;
    }

    protected function checkEmail($users_email)
    {
        $query = "SELECT users_email FROM users WHERE users_email = :users_email";
        $statement = $this->connect()->prepare($query);

        $statement->bindValue(':users_email', $users_email);

        // We now execute the selected command statement
        if (!$statement->execute())
        {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        $result_check = true;

        if ($statement->rowCount() > 0)
        {
            $result_check = false;
        }

        return $result_check;
    }

    protected  function getUserID($users_uid)
    {
        $query = "SELECT user_id FROM users WHERE users_uid = :users_uid;";

        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':users_uid', $users_uid);

        if (!$statement->execute())
        {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        if ($statement->rowCount() == 0)
        {
            $statement = null;
            header("location: ../index.php?error=profilenotfound");

            exit();
        }

        $profile_data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $profile_data;
    }

    private function getCityCode($city)
    {
        $query = "SELECT city_id FROM geo_cities WHERE LOWER(city_name) = LOWER(:city_name);";

        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':city_name', trim($city));

        $statement->execute();

        return  $statement->fetch(PDO::FETCH_ASSOC);
    }
}