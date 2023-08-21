<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SakanaController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request)
    {
    //     $contact = new Contact();
    //     $form = $this->createForm(ContactType::class);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid())
    //     {
    //         $this->addFlash('success', 'votre email a bien été envoyé');

    //         $contactFormData = $form->getData();
    //         $person = $contactFormData['firstname']." ".$contactFormData['lastname'];
    //         $phone = $contactFormData['phone'];
    //         $messageContent = $phone."\n".$person." a écrit depuis sakanasport.com : "."\n\n".$contactFormData['message'];

    //         $message = (new \Swift_Message('You Got Mail!'))
    //             ->setSubject("Email de ".$contactFormData['firstname']." ".$contactFormData['lastname'])
    //             ->setFrom('contact@sakanasport.com')
    //             ->setTo($contactFormData['email'])
    //             ->setBody(
    //                 $messageContent,
    //                 'text/plain'
    //            )
    //        ;

    //        $mailer->send($message);
    //        return $this->redirectToRoute('home');
    //    }

        return $this->render('sakana/index.html.twig', [
            'controller_name' => 'SakanaController',
        ]);
    }

    /**
     * @Route("/openApp/{path}", name="openApp", requirements={"path"=".+"})
     */
    public function openApp($path, Request $request)
    {
        // Check if the "mobile" word exists in User-Agent 
        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
        
        // Check if the "tablet" word exists in User-Agent 
        $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
        
        // Platform check  
        $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
        $isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
        $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
        $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
        $isIOS = $isIPhone || $isIPad; 
        
        $link = null;
        $linkDownload = null;

        if($isMob){ 
            if($isTab){ 
                // echo 'Using Tablet Device...';
                $linkDownload = null;
            } else { 
                if($isIOS){ 
                    // echo 'iOS';
                    $linkDownload = "https://apps.apple.com/fr/app/sakana-sport/id1574508017";
                    $uri = strtok($request->getRequestUri(), "&");
                    $uri = substr($uri, 9);
                    $link = "sakanasports://".$uri;
                } elseif ($isAndroid){ 
                    // echo 'ANDROID';
                    $linkDownload = "https://play.google.com/store/apps/details?id=com.sakanasports";
                    $uri = substr($uri, 9);
                    $link = "sakanasports://".$uri;
                } elseif ($isWin){ 
                    // echo 'WINDOWS'; 
                    $linkDownload = null;
                    $uri = strtok($request->getRequestUri(), "&");
                }
            } 
        } else { 
            // echo 'Using Desktop...';

            $linkDownload = "https://play.google.com/store/apps/details?id=com.sakanasports";
            $uri = strtok($request->getRequestUri(), "&");
            $uri = substr($uri, 9);
            $link = "sakanasports://".$uri;
        }

        return $this->render('openApp.html.twig', [
            'link' => $link,
            'linkDownload' => $linkDownload
        ]);
    }
}
