<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
*@ORM\Entity
*@ORM\Table(name="emailek")
*/

class Emailek
{
	/**
	*@ORM\Id
	*@ORM\Column(type="integer")
	*@ORM\GeneratedValue(strategy="AUTO")
	*/
	
	protected $id;
	
	/**
	*@ORM\Column(type="string", length=100)
	*/
	
	protected $email;
	
	/**
	*@ORM\Column(type="string", length=100)
	*/
	
	protected $targy;
	
	/**
	*@ORM\Column(type="string")
	*/
	
	protected $text;
	
	
	
	//getterek
	public function getId()
	{
		return $this->id;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getTargy()
	{
		return $this->targy;
	}
	public function getText()
	{
		return $this->text;
	}
	
	
	//setterek
	public function setEmail($email)
	{
		$this->email=$email;
	}
	
	public function setTargy($targy)
	{
		$this->targy=$targy;
	}
	public function setText($text)
	{
		$this->text=$text;
	}
	
	
}



?>