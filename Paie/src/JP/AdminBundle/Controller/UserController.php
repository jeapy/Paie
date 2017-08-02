<?php

namespace JP\AdminBundle\Controller;

use JPFichePaieBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('JPFichePaieBundle:User')->findAll();

        return $this->render('JPAdminBundle:User:index.html.twig', array(
            'Users' => $users,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('JPFichePaieBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush($user);

            return $this->redirectToRoute('admin_user_show', array('id' => $user->getId()));
        }

        return $this->render('JPAdminBundle:User:new.html.twig', array(
            'User' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('JPAdminBundle:User:show.html.twig', array(
            'User' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {


        $editForm = $this->createForm('JP\AdminBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

                if ($editForm->isSubmitted() && $editForm->isValid()) {

                    $selectedUser = $request->request->get('value');
                    // Getting the user infos
                    $editUser = $this->getDoctrine()->getRepository('JPFichePaieBundle\Form\UserType', $user);
                    // Using the UserManager (from the FOSUserBundle)
                    $userManager = $this->container->get('fos_user.user_manager');
                    $user = $userManager->findUserByUsername($editUser->getUsername());
                    // Changing the role of the user

                    if ($user->hasRole('ROLE_ADMIN'))
                        {
                            //do something
                        }
                    else{
                        $user->addRole(array($selectedUser['role']));
                    }
                    
                    // Updating the user
                    $userManager->updateUser($user);

                     return $this->redirectToRoute('admin_user_edit', array('id' => $user->getId()));
                }

     return $this->render('JPAdminBundle:User:edit.html.twig', array(
            'User' => $user,
            'edit_form' => $editForm->createView(),
            
        ));
        /*************************************************************************/
    
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush($user);
        }

        return $this->redirectToRoute('admin_user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
