<?php

class ProfileInfoContr extends ProfileInfo
{
    private $user_id;
    private $users_uid;

    public function __construct($user_id, $users_uid)
    {
        $this->user_id   = $user_id;
        $this->users_uid = $users_uid;

    }

    public function setDefaultProfileInfo()
    {
        $profiles_about = "Tell people about yourself!!!!!!";
        $intro_title = "Hi! I am " . $this->users_uid;
        $intro_text = "Welcome to my profile page! Soonnnsnsnsnsnsnnsssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->setProfileInfo($profiles_about, $intro_title, $intro_text, $this->user_id);
    }

    public function updateProfileInfo($profiles_about, $intro_title, $intro_text)
    {

        // Error handlers
        if ($this->isEmptyInput($profiles_about, $intro_title, $intro_text))
        {
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }

        // Update prfile info
        $this->setNewProfileInfo($profiles_about, $intro_title, $intro_text, $this->user_id);
    
    }

    private function isEmptyInput($profiles_about, $intro_title, $intro_text)
    {
        $result = false;

        if (empty($profiles_about) ||
            empty($intro_title)    ||
            empty($intro_text))
        {
            $result = true; 
        }             
        
        return $result;
    }
}