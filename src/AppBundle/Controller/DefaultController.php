<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Emailek;
use ReCaptcha\ReCaptcha;

function testemail($str){							//<----ez a függvények kiszűrik s speciális karaktereket a bejövő adatokbol, hogy elkerüljük az sql adatbázis összeomlását
	$str=htmlentities($str);		 //entitások off
	$str=strip_tags($str);			 //html kódrész off
	$str=trim($str);                 //szóköz off
	$str=stripslashes($str);		 //slashek off									
	return $str;
}
function testtext($str){								
	$str=htmlentities($str);
	$str=strip_tags($str);
	$str=stripslashes($str);
	return $str;
}

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/send", name="sending_email")
     */
    	
	public function sendingAction(Request $request)											//<----Beérkezik a POST a klienstől 
    {
		error_reporting(0);
		$recaptcha=new ReCaptcha('6LdXzT4UAAAAAETe5rK1SZnsdeN8f5AuYQTIBkHQ');	
		$resp=$recaptcha->verify($request->request->get('g-recaptcha-response'), $request->getClientIp());			//<-----reCaptcha ellenőrzés
		if($resp->isSuccess()){
		
			if(isset($_POST['email']) && !empty($_POST['email'])){								//<----Email ellenőrzése szerver oldalon
				$email=$_POST['email'];
				$email=testemail($email);														//<----Futtatjuk a karakterszűrőt az email-en
			}
			else{
				return new response('Hibás az email cím!');
			}
		
			if(isset($_POST['targy']) && !empty($_POST['targy'])){								//<----Tárgy ellenőrzése szerver oldalon
				$targy=$_POST['targy'];
			}
			if(isset($_POST['text']) && strlen($_POST['text'])<513){							//<----Text létezés és hossz ellenőrzése szerver oldalon
				$text=$_POST['text'];
			        
				$textadatb=testtext($text);															//<----Futtatjuk a karakterszűrőt a text-en ami az adatbázisba kerül
				
			
				$em=$this->get('doctrine')->getManager();										//<----adatok felvitele az adatbázisba
				$emailek= new Emailek();
				$emailek->setEmail($email);
				$emailek->setTargy($targy);
				$emailek->setText($textadatb);
				
			                  
				if($em->persist($emailek)<1){													//<------Ellenőrzi hogy sekerűlt ez adatok átadása
					$em->flush();																//<------Adatok tényleges feltöltése
				}else{
					return new response('Nem sikerült menteni az adatbázisba!');
				}                       
			
			
			
				$message = (new \Swift_Message('Hello Email'))									//<-------Első Email felépítése
					->setSubject($targy)
					->setFrom('probaalk@gmail.com')
					->setTo($email)																//<-------A user által választott email cím használata
					->setBody($text);
				$this->get('mailer')
					->send($message);
					
					
				$message = (new \Swift_Message('Hello Email'))									//<-------Első Email felépítése
					->setSubject($targy)
					->setFrom('probaalk@gmail.com')
					->setTo('contact@danielbicskei.com')																//<-------A user által választott email cím használata
					->setBody($text);
				$this->get('mailer')
					->send($message);
			
			
				return new response('Sikeres email küldés '.$email.' email címre');				//<-------User tájékoztatása az eredményről
			}
			else {
				return new response('A szöveg nem lehet hosszabb, mint 512 karakter!!');}
		}
		else{
			return new response('Sikertelen üzenetküldés! Igazold hogy nem vagy robot!');
		}
    }
}
