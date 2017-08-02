<?php

namespace JP\AdminBundle\Controller;

use JPFichePaieBundle\Entity\Convention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Convention controller.
 *
 */
class ConventionController extends Controller
{
    /**
     * Lists all convention entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conventions = $em->getRepository('JPFichePaieBundle:Convention')->findAll();

        return $this->render('JPAdminBundle:convention:index.html.twig', array(
            'conventions' => $conventions,
        ));
    }


/**
     * Finds and displays a convention entity.
     *
     */
    public function showAction(Convention $convention)
    {
        $deleteForm = $this->createDeleteForm($convention);

        return $this->render('JPAdminBundle:convention:show.html.twig', array(
            'convention' => $convention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

      /**
     * Creates a new Convention entity.
     *
     */
    public function newAction(Request $request)
    {
        $convention = new Convention();
        $form = $this->createForm('JPFichePaieBundle\Form\ConventionType', $convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($convention);
            $em->flush($convention);

            return $this->redirectToRoute('admin_convention_show', array('id' => $convention->getId()));
        }

        return $this->render('JPAdminBundle:convention:new.html.twig', array(
            'convention' => $convention,
            'form' => $form->createView(),
        ));
    }

    

    /**
     * Displays a form to edit an existing Convention entity.
     *
     */
    public function editAction(Request $request, Convention $convention)
    {
        $deleteForm = $this->createDeleteForm($convention);
        $editForm = $this->createForm('JPFichePaieBundle\Form\ConventionType', $convention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_convention_edit', array('id' => $convention->getId()));
        }

        return $this->render('JPAdminBundle:convention:edit.html.twig', array(
            'convention' => $convention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Convention entity.
     *
     */
    public function deleteAction(Request $request, Convention $convention)
    {
        $form = $this->createDeleteForm($convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($convention);
            $em->flush($convention);
        }

        return $this->redirectToRoute('admin_convention_index');
    }

    /**
     * Creates a form to delete a Convention entity.
     *
     * @param Convention $Convention The Convention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Convention $convention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_convention_delete', array('id' => $convention->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
