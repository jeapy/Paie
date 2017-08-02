<?php

namespace JPFichePaieBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Session\Session;



use FOS\UserBundle\Controller\ProfileController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;

use JPFichePaieBundle\Entity\User;

use JPFichePaieBundle\Entity\Compagny;
use JPFichePaieBundle\Form\CompagnyType;

use JPFichePaieBundle\Entity\Fichepaie;
use JPFichePaieBundle\Form\FichepaieType;

use JPFichePaieBundle\Entity\Paie;

use JP\AdminBundle\Entity\Offre;


class HomeController  extends BaseController

{
    public function indexAction()
    {
        return $this->render('JPFichePaieBundle:Home:index.html.twig', array(
            // ...
        ));
    }

    public function offreAction()
    {
         $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository('JPAdminBundle:Offre')->findAll();

      
        return $this->render('JPFichePaieBundle:Home:offre.html.twig', array(
            'offres' => $offres,
        ));
    }



    public function ficheAction(Request $request)
    {    $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);


        $fichepaie = new Fichepaie();
        $form = $this->createForm('JPFichePaieBundle\Form\FichepaieType', $fichepaie);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
             $fichepaie->setCreateby($user);
             $fichepaie->setDateheure(new \Datetime());
            $em->persist($fichepaie);
            $em->flush($fichepaie);

            return $this->redirectToRoute('jp_fiche_paie_document', array('id' => $fichepaie->getId()));
        }

       
    	 
        return $this->render('JPFichePaieBundle:Home:fiche.html.twig', array(       
     			'fichepaie' => $fichepaie,
                'us'        => $users,
                'form'      => $form->createView(),
                
        ));
    }


    public function editFicheAction(Request $request, Fichepaie $fichepaie)
    {   $user = $this->getUser();
         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);


       
        $editForm = $this->createForm('JPFichePaieBundle\Form\FichepaieType', $fichepaie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jp_fiche_paie_document', array('id' => $fichepaie->getId()));
        }

        return $this->render('JPFichePaieBundle:Home:editfiche.html.twig', array(
            'fichepaie' => $fichepaie,
            'us'        => $users,
            'edit_form' => $editForm->createView(),
            
        ));
    }

  
public function deleteFicheAction(Fichepaie $fichepaie)
{
    if (!$fichepaie) {
        throw $this->createNotFoundException('No Fichepaie found');
    }

    $em = $this->getDoctrine()->getEntityManager();
    $em->remove($fichepaie);
    $em->flush();

    return $this->redirectToRoute('jp_fiche_paie_document');
}
//----------------------------------------------------------------------------------------------------------//

public function pdfAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:Home:pdf.html.twig', array(
              'us' =>   $users,
              'fiche' =>   $fichepaie
            ));

            return new Response(
                $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                200,
                array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'attachment; filename="Myfile.pdf"'
                )
            );

        }


         

//----------------------------------------------------------------------------------------------------------//

public function paiementAction(Request $request, Offre $offre)
    {        
          return $this->render('JPFichePaieBundle:Home:paiement.html.twig', array(
            'of' => $offre,
                      
        ));
    }


public function payerAction(Request $request, Offre $offre)
    {   $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();
        
        $off = $em->getRepository('JPAdminBundle:Offre')->findById($offre);
        
       
        $offredu = new \Datetime();
        $offreau= new \Datetime();
       

        $paie = new Paie();

        $paie->setOffredu($offredu);
       

       

        $paie->setDatepaiement(new \Datetime());
        $paie->setUser($user);
        $paie->setOffre($offre);

         foreach($off as $of) {
            $nb = $of->getNbulletin();
        $paie->setNombrefiche($nb);

         $offreau->modify('+'.$nb. ' month');
         $paie->setOffreau($offreau);
        }
     
        
        $em->persist($paie);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Offre bien enregistrée.');



          return $this->render('JPFichePaieBundle:Home:index.html.twig', array(
           //...........                   
        ));
    }
    public function documentAction(Request $request)
    {    $user = $this->getUser();
         $em = $this->getDoctrine()->getManager();
        $fichepaies = $em->getRepository('JPFichePaieBundle:Fichepaie')->findByCreateby( $user);
        $ficheok = $em->getRepository('JPFichePaieBundle:Fichepaie')->findBy( array('createby' => $user,
                                                                                    'realise' => '100%'));

        $resultCountok = count($ficheok);
         $Count = count($fichepaies);


        return $this->render('JPFichePaieBundle:Home:document.html.twig', array(
            'fichepaies' => $fichepaies,
            'resultnbre' => $resultCountok ,
            'totnbre'    => $Count,
           
        ));
    }



public function compteAction(Request $request)
    {
           
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
       return $this->render('JPFichePaieBundle:Home:compte.html.twig', array(       
               'user' => $user,  
        ));
    }
public function compteditAction(Request $request)
    {
       $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        /** @var $formFactory FactoryInterface */
        $formFactory = $this->get('fos_user.profile.form.factory');

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var $userManager UserManagerInterface */
            $userManager = $this->get('fos_user.user_manager');

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_profile_show');
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::PROFILE_EDIT_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }


          return $this->render('JPFichePaieBundle:Home:comptedit.html.twig', array(       
               'form' => $form->createView(), 
        ));
    }
    

   
     public function getcompagnyAction(Request $request) {

        $em = $this->getDoctrine()->getEntityManager();

        if($request->isXmlHttpRequest()) { // pour vérifier la présence d'une requete Ajax

              $i =   $request->query->get('id');

                if ($id != '') {
                  
                    $ensembles = $em->getRepository('JPFichePaieBundle:Compagny')->findById($id);

                     $tabEnsembles = array();
                    $i = 0;

                        foreach($ensembles as $e) { // transformer la réponse de la requete en tableau qui remplira le select pour ensembles
                            $tabEnsembles[$i]['id'] = $e->getId();
                            $tabEnsembles[$i]['name'] = $e->getName();
                             $tabEnsembles[$i]['address'] = $e->getAddress();
                             $tabEnsembles[$i]['siret'] = $e->getSiret();
                             $tabEnsembles[$i]['urssaf'] = $e->getUrssaf();
                             $tabEnsembles[$i]['naf'] = $e->getNaf();
                                $tabEnsembles[$i]['conv'] =  $e->getConvention()->getLibelle();
                            $i++;
                        }
                    $response = new Response();

                    $data = json_encode($tabEnsembles); // formater le résultat de la requête en json

                    $response->headers->set('Content-Type', 'application/json');
                    $response->setContent($data);

                    return $response;
              }
        } else {

            return new Response('BIM ça plante',
                                            404,
                                            array(
                                                'Content-Type'          => 'application/text'                   
                                            ));
        }
    }


 
public function factureAction(Request $request)
    {   
        $user = $this->getUser();
         $em = $this->getDoctrine()->getManager();
        $paie = $em->getRepository('JPFichePaieBundle:Paie')->findByUser( $user);     
          return $this->render('JPFichePaieBundle:Home:facture.html.twig', array(
            'paies' => $paie,
                      
        ));
    }   


public function imprimefactureAction(Request $request,Paie $paie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:Home:pdf.html.twig', array(
              'us' =>   $users,
              'fiche' =>   $paie
            ));

            return new Response(
                $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
                200,
                array(
                    'Content-Type'          => 'application/pdf',
                    'Content-Disposition'   => 'attachment; filename="Myfile.pdf"'
                )
            );

        }



}
