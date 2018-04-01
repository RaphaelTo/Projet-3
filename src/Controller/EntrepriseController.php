<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;


class EntrepriseController extends Controller
{
    /**
     * @Route("/entreprise", name="entreprise")
     */
    public function index()
    {
        $base = $this->getDoctrine()->getRepository(Entreprise::class); //mettre le nom de la classe ::class va recuperer la methode getRepository qui et dans Doctrine

        $entreprise = $base->findAll();

        return $this->render('entreprise/index.html.twig', [
            'entreprise' => $entreprise
        ]);

    }

    /**
     * @Route("/entreprise/ajout", name="entreprise_ajout")
     */


    public function ajoutEntreprise(Request $request){
        $entreprise = new Entreprise();

        $entreprise->setNomEntreprise(' ');
        $entreprise->setVilleEntreprise(' ');
        $entreprise->setCpEntreprise(' ');
        $entreprise->setAdresseEntreprise(' ');
        $entreprise->setMailEntreprise(' ');
        $entreprise->setTelEntreprise(' ');
        $entreprise->setActiviteEntreprise(' ');

        $form = $this->createFormBuilder($entreprise)
            ->add('nomEntreprise',TextType::class)
            ->add("villeEntreprise",TextType::class)
            ->add("cpEntreprise", TextType::class)
            ->add("adresseEntreprise", TextType::class)
            ->add("mailEntreprise", EmailType::class)
            ->add("telEntreprise", TextType::class)
            ->add("activiteEntreprise", TextType::class)
            ->getForm();

        if($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));

            if($form->isSubmitted() && $form->isValid()){
                $entreprise = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();

                return $this->redirectToRoute('entreprise');
            }
        }

        return $this->render('entreprise/ajout.html.twig', array(
                'form'=> $form->createView()
        ));

    }


}
