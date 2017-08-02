<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{
    /**
     * Lists all offre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('JPAdminBundle:Offre')->findAll();

        return $this->render('JPAdminBundle:offre:index.html.twig', array(
            'offres' => $offres,
        ));
    }

    /**
     * Creates a new offre entity.
     *
     */
    public function newAction(Request $request)
    {
        $offre = new Offre();
        $form = $this->createForm('JP\AdminBundle\Form\OffreType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush($offre);

            return $this->redirectToRoute('admin_offre_show', array('id' => $offre->getId()));
        }

        return $this->render('JPAdminBundle:offre:new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     */
    public function showAction(Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);

        return $this->render('JPAdminBundle:offre:show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     */
    public function editAction(Request $request, Offre $offre)
    {
        $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('JP\AdminBundle\Form\OffreType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_offre_edit', array('id' => $offre->getId()));
        }

        return $this->render('JPAdminBundle:offre:edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offre entity.
     *
     */
    public function deleteAction(Request $request, Offre $offre)
    {
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush($offre);
        }

        return $this->redirectToRoute('admin_offre_index');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offre $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_offre_delete', array('id' => $offre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
