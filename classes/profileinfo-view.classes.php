<?php

class ProfileInfoView extends ProfileInfo
{
    public function fetchAbout($user_id)
    {
        $profile_info = $this->getProfileInfo($user_id);

        echo $profile_info[0]["profiles_about"];
    }

    public function fetchTitle($user_id)
    {
        $profile_info = $this->getProfileInfo($user_id);

        echo $profile_info[0]["intro_title"];
    }

    public function fetchText($user_id)
    {
        $profile_info = $this->getProfileInfo($user_id);

        echo $profile_info[0]["intro_text"];
    }
}