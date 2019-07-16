<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Employer;
use App\Form\EmployerType;
use Symfony\Component\HttpFoundation\Response;

class EmployerController extends AbstractController
{     

     /**
     * @Route("/", name="employer_liste")
     */
    public function index()
    {
            $employers=$this->getDoctrine()->getRepository(Employer::class)->findAll();
            return $this->render('employer/list.html.twig',
            ['controller_name'=>'EmployerController','employers' =>$employers]);
    }
   
    /**
     * @Route("/employer", name="employer")
     */
    public function cread(Request $request,Employer  $employer=NULL )
    { 
        $employer   = new Employer();
        $form       = $this->createForm(EmployerType::class,$employer);
        $es =$this->getDoctrine()->getManager();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $es->persist($employer);
            $es->flush();
        return $this->redirectToRoute('employer_liste');
        }
        return $this->render('employer/index.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
      /**
     * @Route("/employer/delete/{id}")
     * @Method({"GET"})
     */
   public function delete(Request $request,$id)
    {
            $employers=$this->getDoctrine()->getRepository(Employer::class)->find($id);
            $es =$this->getDoctrine()->getManager();
            $es->remove($employers);
            $es->flush();
            $reponse =new Response();
            $reponse->send();
    }
    /**
     * @Route("/employer/{id}", name="employer")
     * @Method({"GET"})
     */
    public function edit(Request $request,$id)
    { 
       
        $employers=$this->getDoctrine()->getRepository(Employer::class)->find($id);
        $form       = $this->createForm(EmployerType::class,$employers);
        $es =$this->getDoctrine()->getManager();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $es->persist($employers);
            $es->flush();
        return $this->redirectToRoute('employer_liste');
        }
        return $this->render('employer/index.html.twig', [
            'form' =>$form->createView(),
        ]);
    }
    
}
