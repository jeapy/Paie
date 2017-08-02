<?php

namespace JPFichePaieBundle\Controller;


use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


use JPFichePaieBundle\Entity\User;
use JPFichePaieBundle\Entity\Fichepaie;

use JPFichePaieBundle\Entity\Compagny;
use JPFichePaieBundle\Form\CompagnyType;

use JPFichePaieBundle\Form\FichepaieType;
/**
 * Fichepaie controller.
 *
 */
class FichepaieController extends Controller
{
   

    /**
     * Lists all fichepaie entities.
     *
     */

    public function btpAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:btp.html.twig', array(
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

         public function commercedetailAction(Request $request,Fichepaie $fichepaie)    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:commercedetail.html.twig', array(
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
         public function commercedetailgrosAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:commercedetailgros.html.twig', array(
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

         public function commercegrosAction(Request $request,Fichepaie $fichepaie)    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:commercegros.html.twig', array(
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

 public function hcrAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:hcr.html.twig', array(
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

         public function msaAction(Request $request,Fichepaie $fichepaie)    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:msa.html.twig', array(
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

 public function prestationserviceAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:prestationservice.html.twig', array(
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

         public function proprieteAction(Request $request,Fichepaie $fichepaie)    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:propriete.html.twig', array(
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

 public function syntecAction(Request $request,Fichepaie $fichepaie)
    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:syntec.html.twig', array(
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

         public function transportroutierAction(Request $request,Fichepaie $fichepaie)    {
           $user = $this->getUser();

         $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('JPFichePaieBundle:User')->find( $user);

           $data =array();

 
            $html = $this->renderView('JPFichePaieBundle:fichepaie:transportroutier.html.twig', array(
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


}
