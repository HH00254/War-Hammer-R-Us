<?php

class ProfileInfo extends Dbh
{

    protected  function getProfileInfo($user_id)
    {
        $query = "SELECT * FROM users_profiles WHERE user_id = :user_id;";

        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':user_id', $user_id);

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

    protected  function setNewProfileInfo($profiles_about, $intro_title, $intro_text, $user_id)
    {
        $query = 
            "UPDATE users_profiles 
             SET profiles_about = :profiles_about, intro_title = :intro_title, intro_text = :intro_text
             WHERE user_id = :user_id;";

        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':profiles_about', $profiles_about);
        $statement->bindValue(':intro_title', $intro_title);
        $statement->bindValue(':intro_text', $intro_text);
        $statement->bindValue(':user_id', $user_id);

        if (!$statement->execute())
        {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        $statement = null;
    }

    protected function setProfileInfo($profiles_about, $intro_title, $intro_text, $user_id)
    {
        $query = 
            "INSERT INTO users_profiles (profiles_about, intro_title, intro_text, user_id)
             VALUES (:profiles_about, :intro_title, :intro_text, :user_id);";

        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':profiles_about', $profiles_about);
        $statement->bindValue(':intro_title', $intro_title);
        $statement->bindValue(':intro_text', $intro_text);
        $statement->bindValue(':user_id', $user_id);

        if (!$statement->execute())
        {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");

            exit();
        }

        $statement = null;
    }


}