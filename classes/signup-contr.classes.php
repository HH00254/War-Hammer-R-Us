<?php 

class SignupContr extends Signup
{
     
    private $city_id;
    private $users_uid;
    private $user_first_name;
    private $user_last_name;
    private $users_email;
    private $users_email_repeat;
    private $user_address;
    private $postal_code;
    private $users_pwd;
    private $users_pwd_repeat;
    private $cardholder_name;
    private $card_number_token;
    private $expiration_date;
    private $notes;
    private $role_id;

    //($uid, $pwd, $pwdRepeat, $email)
    public function __construct($city_id,
                                $users_uid,
                                $user_first_name,
                                $user_last_name,
                                $users_email,
                                $users_email_repeat,
                                $user_address,
                                $postal_code,
                                $users_pwd,
                                $users_pwd_repeat,
                                $cardholder_name = null,
                                $card_number_token = null,
                                $expiration_date,
                                $notes = null,
                                $role_id = 1)
    {
        $this->city_id              = $city_id;
        $this->users_uid            = $users_uid;
        $this->user_first_name      = $user_first_name;
        $this->user_last_name       = $user_last_name;
        $this->users_email          = $users_email;
        $this->users_email_repeat   = $users_email_repeat;
        $this->user_address         = $user_address;
        $this->postal_code          = $postal_code;
        $this->users_pwd            = $users_pwd;
        $this->users_pwd_repeat     = $users_pwd_repeat;
        $this->cardholder_name      = $cardholder_name;
        $this->card_number_token    = $card_number_token;
        $this->expiration_date      = $expiration_date;
        $this->notes                = $notes;
        $this->role_id              = $role_id;
    }

    public function signupUser()
    {
        if ($this->emptyInput() == false) 
        {
            header("location: ../index.php?error=1emptyinput");
            exit();
        }
        if ($this->invalidUid() == false) 
        {
            header("location: ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail() == false) 
        {
            header("location: ../index.php?error=email");
            exit();
        }
        if ($this->emailMatch() == false) {
            header("location: ../index.php?error=emailmatch");
            exit();
        }
        if ($this->emailTakenCheck() == false) {
            header("location: ../index.php?error=emailtaken");
            exit();
        }
        if ($this->pwdMatch() == false) 
        {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) 
        {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->city_id,
                       $this->users_uid,
                       $this->user_first_name,
                       $this->user_last_name,
                       $this->users_email,
                       $this->user_address,
                       $this->postal_code,
                       $this->users_pwd,
                       $this->cardholder_name,
                       $this->card_number_token,
                       $this->expiration_date,
                       $this->notes,
                       $this->role_id);
    }

    private function emptyInput()
    {
        $result = true;

        if (empty($this->city_id)              ||
            empty($this->users_uid)            ||
            empty($this->user_first_name)      ||
            empty($this->user_last_name)       ||
            empty($this->users_email)          ||
            empty($this->users_email_repeat)   ||
            empty($this->user_address)         ||
            empty($this->postal_code)          ||
            empty($this->users_pwd)            ||
            empty($this->users_pwd_repeat))
        {
            $result = false; 
        }             
        
        return $result;
    }

    private function invalidUid() 
    {
        $result = true;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->users_uid))
        {
            $result = false;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = true;

        if (!filter_var($this->users_email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = false;
        }

        return $result;
    }

    private function emailMatch()
    {
        $result = true;

        if ($this->users_email !== $this->users_email_repeat)
        {
            $result = false;
        }

        return $result;
    }

    private function emailTakenCheck()
    {
        $result = true;

        if (!$this->checkEmail($this->users_email))
        {
            $result = false;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = true;

        if ($this->users_pwd !== $this->users_pwd_repeat)
        {
            $result = false;
        }

        return $result;
    }

    private function uidTakenCheck()
    {
        $result = true;

        if (!$this->checkUser($this->users_uid, $this->users_email))
        {
            $result = false;
        }

        return $result;
    }

    public function fetchUserID($users_uid)
    {
        $fetched_users_data = $this->getUserID($users_uid);

        return $fetched_users_data[0]["user_id"];
    }
}