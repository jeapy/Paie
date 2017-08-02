<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\StatusSalary;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Statussalary controller.
 *
 */
class StatusSalaryController extends Controller
{
    /**
     * Lists all statusSalary entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statusSalaries = $em->getRepository('JPAdminBundle:StatusSalary')->findAll();

        return $this->render('JPAdminBundle:statussalary:index.html.twig', array(
            'statusSalaries' => $statusSalaries,
        ));
    }

    /**
     * Creates a new statusSalary entity.
     *
     */
    public function newAction(Request $request)
    {
        $statusSalary = new Statussalary();
        $form = $this->createForm('JP\AdminBundle\Form\StatusSalaryType', $statusSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statusSalary);
            $em->flush($statusSalary);

            return $this->redirectToRoute('admin_status_show', array('id' => $statusSalary->getId()));
        }

        return $this->render('JPAdminBundle:statussalary:new.html.twig', array(
            'statusSalary' => $statusSalary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a statusSalary entity.
     *
     */
    public function showAction(StatusSalary $statusSalary)
    {
        $deleteForm = $this->createDeleteForm($statusSalary);

        return $this->render('JPAdminBundle:statussalary:show.html.twig', array(
            'statusSalary' => $statusSalary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing statusSalary entity.
     *
     */
    public function editAction(Request $request, StatusSalary $statusSalary)
    {
        $deleteForm = $this->createDeleteForm($statusSalary);
        $editForm = $this->createForm('JP\AdminBundle\Form\StatusSalaryType', $statusSalary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_status_edit', array('id' => $statusSalary->getId()));
        }

        return $this->render('JPAdminBundle:statussalary:edit.html.twig', array(
            'statusSalary' => $statusSalary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a statusSalary entity.
     *
     */
    public function deleteAction(Request $request, StatusSalary $statusSalary)
    {
        $form = $this->createDeleteForm($statusSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($statusSalary);
            $em->flush($statusSalary);
        }

        return $this->redirectToRoute('admin_status_index');
    }

    /**
     * Creates a form to delete a statusSalary entity.
     *
     * @param StatusSalary $statusSalary The statusSalary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StatusSalary $statusSalary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_status_delete', array('id' => $statusSalary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
