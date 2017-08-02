<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\ModePaie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Modepaie controller.
 *
 */
class ModePaieController extends Controller
{
    /**
     * Lists all modePaie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modePaies = $em->getRepository('JPAdminBundle:ModePaie')->findAll();

        return $this->render('JPAdminBundle:modepaie:index.html.twig', array(
            'modePaies' => $modePaies,
        ));
    }

    /**
     * Creates a new modePaie entity.
     *
     */
    public function newAction(Request $request)
    {
        $modePaie = new Modepaie();
        $form = $this->createForm('JP\AdminBundle\Form\ModePaieType', $modePaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modePaie);
            $em->flush($modePaie);

            return $this->redirectToRoute('admin_modepaie_show', array('id' => $modePaie->getId()));
        }

        return $this->render('JPAdminBundle:modepaie:new.html.twig', array(
            'modePaie' => $modePaie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modePaie entity.
     *
     */
    public function showAction(ModePaie $modePaie)
    {
        $deleteForm = $this->createDeleteForm($modePaie);

        return $this->render('JPAdminBundle:modepaie:show.html.twig', array(
            'modePaie' => $modePaie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modePaie entity.
     *
     */
    public function editAction(Request $request, ModePaie $modePaie)
    {
        $deleteForm = $this->createDeleteForm($modePaie);
        $editForm = $this->createForm('JP\AdminBundle\Form\ModePaieType', $modePaie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_modepaie_edit', array('id' => $modePaie->getId()));
        }

        return $this->render('JPAdminBundle:modepaie:edit.html.twig', array(
            'modePaie' => $modePaie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modePaie entity.
     *
     */
    public function deleteAction(Request $request, ModePaie $modePaie)
    {
        $form = $this->createDeleteForm($modePaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modePaie);
            $em->flush($modePaie);
        }

        return $this->redirectToRoute('admin_modepaie_index');
    }

    /**
     * Creates a form to delete a modePaie entity.
     *
     * @param ModePaie $modePaie The modePaie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModePaie $modePaie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_modepaie_delete', array('id' => $modePaie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
