<?php

namespace FastForward\ManageBundle\Entity;

class AuthorsData
{
    protected $firstName;
    protected $lastName;
    protected $middleName;
    protected $namePrefix;
    protected $nameSuffix;
    protected $bio;
    protected $status;
    protected $tags;    
    protected $comment;
    protected $pictureFile;
    
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($first_name)
    {
        $this->firstName = $first_name;
    }
    //-------------------------------------------
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $last_name;
    }
    //-------------------------------------------
    public function getMiddleName()
    {
        return $this->middleName;
    }
    public function setMiddleName($middle_name)
    {
        $this->middleName = $middle_name;
    }
    //-------------------------------------------
    public function getNamePrefix()
    {
        return $this->namePrefix;
    }
    public function setNamePrefix($name_prefix)
    {
        $this->namePrefix = $name_prefix;
    }
    //-------------------------------------------
    public function getNameSuffix()
    {
        return $this->nameSuffix;
    }
    public function setNameSuffix($name_suffix)
    {
        $this->nameSuffix = $name_suffix;
    }
    //-------------------------------------------
    public function getBio()
    {
        return $this->bio;
    }
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
    //-------------------------------------------
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    //-------------------------------------------
    public function getTags()
    {
        return $this->tags;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
    }  
    //-------------------------------------------
    public function getComment()
    {
        return $this->comment;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }  
    //-------------------------------------------
    public function getPictureFile()
    {
        return $this->pictureFile;
    }
    public function setPictureFile($picture_file)
    {
        $this->pictureFile = $picture_file;
    }   
    
}
?>
