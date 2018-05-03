<?php

class Contact
{
    protected $first_name;
    protected $last_name;
    protected $image;
    protected $about;
    protected $email;
    protected $phone;
    protected $facebook;
    protected $instagram;
    protected $twitter;
    
    function getFirst_name()
    {
        return $this->first_name;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function getImage()
    {
        return $this->image;
    }

    function getAbout()
    {
        return $this->about;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getFacebook()
    {
        return $this->facebook;
    }

    function getInstagram()
    {
        return $this->instagram;
    }

    function getTwitter()
    {
        return $this->twitter;
    }

    
    function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    function setImage($image)
    {
        $this->image = $image;
    }

    function setAbout($about)
    {
        $this->about = $about;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    
    public function contactName()
    {
        $contact_name = $this->first_name . " " . $this->last_name;
        return $contact_name;
    }

    public function __construct($input = false)
    {
        if (is_array($input))
        {
            foreach ($input as $key => $val)
            {
                $this->$key = $val;
            }
        }
    }
}
