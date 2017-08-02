<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\AvantageSalary;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Avantagesalary controller.
 *
 */
class AvantageSalaryController extends Controller
{
    /**
     * Lists all avantageSalary entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $avantageSalaries = $em->getRepository('JPAdminBundle:AvantageSalary')->findAll();

        return $this->render('JPAdminBundle:avantagesalary:index.html.twig', array(
            'avantageSalaries' => $avantageSalaries,
        ));
    }

    /**
     * Creates a new avantageSalary entity.
     *
     */
    public function newAction(Request $request)
    {
        $avantageSalary = new Avantagesalary();
        $form = $this->createForm('JP\AdminBundle\Form\AvantageSalaryType', $avantageSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avantageSalary);
            $em->flush($avantageSalary);

            return $this->redirectToRoute('admin_avantage_show', array('id' => $avantageSalary->getId()));
        }

        return $this->render('JPAdminBundle:avantagesalary:new.html.twig', array(
            'avantageSalary' => $avantageSalary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a avantageSalary entity.
     *
     */
    public function showAction(AvantageSalary $avantageSalary)
    {
        $deleteForm = $this->createDeleteForm($avantageSalary);

        return $this->render('JPAdminBundle:avantagesalary:show.html.twig', array(
            'avantageSalary' => $avantageSalary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing avantageSalary entity.
     *
     */
    public function editAction(Request $request, AvantageSalary $avantageSalary)
    {
        $deleteForm = $this->createDeleteForm($avantageSalary);
        $editForm = $this->createForm('JP\AdminBundle\Form\AvantageSalaryType', $avantageSalary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_avantage_edit', array('id' => $avantageSalary->getId()));
        }

        return $this->render('JPAdminBundle:avantagesalary:edit.html.twig', array(
            'avantageSalary' => $avantageSalary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a avantageSalary entity.
     *
     */
    public function deleteAction(Request $request, AvantageSalary $avantageSalary)
    {
        $form = $this->createDeleteForm($avantageSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($avantageSalary);
            $em->flush($avantageSalary);
        }

        return $this->redirectToRoute('admin_avantage_index');
    }

    /**
     * Creates a form to delete a avantageSalary entity.
     *
     * @param AvantageSalary $avantageSalary The avantageSalary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AvantageSalary $avantageSalary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_avantage_delete', array('id' => $avantageSalary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
