<?php

namespace JP\AdminBundle\Controller;

use JP\AdminBundle\Entity\PrimeSalary;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Primesalary controller.
 *
 */
class PrimeSalaryController extends Controller
{
    /**
     * Lists all primeSalary entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $primeSalaries = $em->getRepository('JPAdminBundle:PrimeSalary')->findAll();

        return $this->render('JPAdminBundle:primesalary:index.html.twig', array(
            'primeSalaries' => $primeSalaries,
        ));
    }

    /**
     * Creates a new primeSalary entity.
     *
     */
    public function newAction(Request $request)
    {
        $primeSalary = new Primesalary();
        $form = $this->createForm('JP\AdminBundle\Form\PrimeSalaryType', $primeSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($primeSalary);
            $em->flush($primeSalary);

            return $this->redirectToRoute('admin_prime_show', array('id' => $primeSalary->getId()));
        }

        return $this->render('JPAdminBundle:primesalary:new.html.twig', array(
            'primeSalary' => $primeSalary,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a primeSalary entity.
     *
     */
    public function showAction(PrimeSalary $primeSalary)
    {
        $deleteForm = $this->createDeleteForm($primeSalary);

        return $this->render('JPAdminBundle:primesalary:show.html.twig', array(
            'primeSalary' => $primeSalary,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing primeSalary entity.
     *
     */
    public function editAction(Request $request, PrimeSalary $primeSalary)
    {
        $deleteForm = $this->createDeleteForm($primeSalary);
        $editForm = $this->createForm('JP\AdminBundle\Form\PrimeSalaryType', $primeSalary);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_prime_edit', array('id' => $primeSalary->getId()));
        }

        return $this->render('JPAdminBundle:primesalary:edit.html.twig', array(
            'primeSalary' => $primeSalary,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a primeSalary entity.
     *
     */
    public function deleteAction(Request $request, PrimeSalary $primeSalary)
    {
        $form = $this->createDeleteForm($primeSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($primeSalary);
            $em->flush($primeSalary);
        }

        return $this->redirectToRoute('admin_prime_index');
    }

    /**
     * Creates a form to delete a primeSalary entity.
     *
     * @param PrimeSalary $primeSalary The primeSalary entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PrimeSalary $primeSalary)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_prime_delete', array('id' => $primeSalary->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
