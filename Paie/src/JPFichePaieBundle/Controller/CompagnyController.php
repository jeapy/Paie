<?php

namespace JPFichePaieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use JPFichePaieBundle\Entity\Compagny;
use JPFichePaieBundle\Form\CompagnyType;

use FOS\UserBundle\Model\UserInterface;

class CompagnyController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $compagny = $em->getRepository('JPFichePaieBundle:Compagny')->findAll();

        return $this->render('JPFichePaieBundle:Compagny:index.html.twig', array(
            'compagny' => $compagny,
            'us'=> $user,
        ));
    }

    public function newAction(Request $request)
    {
        $user = $this->getUser();
        $compagny = new Compagny();
        $form = $this->createForm('JPFichePaieBundle\Form\CompagnyType', $compagny);
        $form->handleRequest($request);

         //getImage()->setUrl('test.png');

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $compagny->setCreateby($user);
            $em->persist($compagny);
            $em->flush($compagny);

            return $this->redirectToRoute('fiche_paie_compagny_show', array('id' => $compagny->getId()));
        }

        return $this->render('JPFichePaieBundle:Compagny:new.html.twig', array(
           'compagny' => $compagny,
            'form' => $form->createView(),
        ));
    }

    public function showAction(Compagny $compagny)
    {$user = $this->getUser();
        $deleteForm = $this->createDeleteForm($compagny);
       
        return $this->render('JPFichePaieBundle:Compagny:show.html.twig', array(
             'compagny' => $compagny,
            'delete_form' => $deleteForm->createView(),
             'us'=> $user,
        ));
    }

    public function editAction(Request $request, Compagny $compagny)
    { 
        $deleteForm = $this->createDeleteForm($compagny);
        $editForm = $this->createForm('JPFichePaieBundle\Form\CompagnyType', $compagny);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_paie_compagny_edit', array('id' => $compagny->getId()));
        }

        return $this->render('JPFichePaieBundle:Compagny:edit.html.twig', array(
            'compagny' => $compagny,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


   
    public function deleteAction(Request $request, Compagny $compagny)
    {
       $form = $this->createDeleteForm($compagny);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($compagny);
            $em->flush($compagny);
        }

        return $this->redirectToRoute('fiche_paie_compagny_index');
    }


    /**
     * Creates a form to delete a typeUser entity.
     *
     * @param TypeUser $typeUser The typeUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Compagny $compagny)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fiche_paie_compagny_delete', array('id' => $compagny->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
