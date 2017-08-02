<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\EmploiSalary;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Emploisalary controller.
 *
 */
class EmploiSalaryController extends Controller
{
    /**
     * Lists all emploiSalary entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $emploiSalaries = $em->getRepository('JPAdminBundle:EmploiSalary')->findAll();

        return $this->render('JPAdminBundle:emploisalary:index.html.twig', array(
            'emploiSalaries' => $emploiSalaries,
        ));
    }

    /**
     * Creates a new emploiSalary entity.
     *
     */
    public function newAction(Request $request)
    {
        $emploiSalary = new Emploisalary();
        $form = $this->createForm('JP\AdminBundle\Form\EmploiSalaryType', $emploiSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emploiSalary);
            $em->flush($emploiSalary);

            return $this->redirectToRoute('admin_emploi_show', array('id' => $emploiSalary->getId()));
        }

        return $this->render('JPAdminBundle:emploisalary:new.html.twig', array(
            'emploiSalary' => $emploiSalary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a emploiSalary entity.
     *
     */
    public function showAction(EmploiSalary $emploiSalary)
    {
        $deleteForm = $this->createDeleteForm($emploiSalary);

        return $this->render('JPAdminBundle:emploisalary:show.html.twig', array(
            'emploiSalary' => $emploiSalary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing emploiSalary entity.
     *
     */
    public function editAction(Request $request, EmploiSalary $emploiSalary)
    {
        $deleteForm = $this->createDeleteForm($emploiSalary);
        $editForm = $this->createForm('JP\AdminBundle\Form\EmploiSalaryType', $emploiSalary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_emploi_edit', array('id' => $emploiSalary->getId()));
        }

        return $this->render('JPAdminBundle:emploisalary:edit.html.twig', array(
            'emploiSalary' => $emploiSalary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a emploiSalary entity.
     *
     */
    public function deleteAction(Request $request, EmploiSalary $emploiSalary)
    {
        $form = $this->createDeleteForm($emploiSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($emploiSalary);
            $em->flush($emploiSalary);
        }

        return $this->redirectToRoute('admin_emploi_index');
    }

    /**
     * Creates a form to delete a emploiSalary entity.
     *
     * @param EmploiSalary $emploiSalary The emploiSalary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EmploiSalary $emploiSalary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_emploi_delete', array('id' => $emploiSalary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
