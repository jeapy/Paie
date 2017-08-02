<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\PositionSalary;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Positionsalary controller.
 *
 */
class PositionSalaryController extends Controller
{
    /**
     * Lists all positionSalary entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $positionSalaries = $em->getRepository('JPAdminBundle:PositionSalary')->findAll();

        return $this->render('JPAdminBundle:positionsalary:index.html.twig', array(
            'positionSalaries' => $positionSalaries,
        ));
    }

    /**
     * Creates a new positionSalary entity.
     *
     */
    public function newAction(Request $request)
    {
        $positionSalary = new Positionsalary();
        $form = $this->createForm('JP\AdminBundle\Form\PositionSalaryType', $positionSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($positionSalary);
            $em->flush($positionSalary);

            return $this->redirectToRoute('admin_position_show', array('id' => $positionSalary->getId()));
        }

        return $this->render('JPAdminBundle:positionsalary:new.html.twig', array(
            'positionSalary' => $positionSalary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a positionSalary entity.
     *
     */
    public function showAction(PositionSalary $positionSalary)
    {
        $deleteForm = $this->createDeleteForm($positionSalary);

        return $this->render('JPAdminBundle:positionsalary:show.html.twig', array(
            'positionSalary' => $positionSalary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing positionSalary entity.
     *
     */
    public function editAction(Request $request, PositionSalary $positionSalary)
    {
        $deleteForm = $this->createDeleteForm($positionSalary);
        $editForm = $this->createForm('JP\AdminBundle\Form\PositionSalaryType', $positionSalary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_position_edit', array('id' => $positionSalary->getId()));
        }

        return $this->render('JPAdminBundle:positionsalary:edit.html.twig', array(
            'positionSalary' => $positionSalary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a positionSalary entity.
     *
     */
    public function deleteAction(Request $request, PositionSalary $positionSalary)
    {
        $form = $this->createDeleteForm($positionSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($positionSalary);
            $em->flush($positionSalary);
        }

        return $this->redirectToRoute('admin_position_index');
    }

    /**
     * Creates a form to delete a positionSalary entity.
     *
     * @param PositionSalary $positionSalary The positionSalary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PositionSalary $positionSalary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_position_delete', array('id' => $positionSalary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
