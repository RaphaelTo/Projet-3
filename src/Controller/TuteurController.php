<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Tuteur;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TuteurController extends Controller
{
    /**
     * @Route("/tuteur", name="tuteur")
     */
    public function index()
    {
        $base = $this->getDoctrine()->getRepository(Tuteur::class);

        $tuteur = $base->findAll();

        return $this->render('tuteur/index.html.twig', [
            'tuteur' => $tuteur,
        ]);
    }

    /**
     * @Route("/tuteur/ajout", name="tuteur_ajout")
     */

    public function ajoutTuteur(Request $request){
        $tuteur = new Tuteur();
        $entreprise = new Entreprise();

        $tuteur->setNomTuteur(' ');
        $tuteur->setPrenomTuteur(' ');
        $tuteur->setMailTuteur(' ');
        $tuteur->setTelTuteur(' ');
        $tuteur->setEntreprise(' ');


        $form = $this->createFormBuilder($tuteur)
            ->add('nomTuteur', TextType::class)
            ->add('prenomTuteur', TextType::class)
            ->add('mailTuteur',EmailType::class)
            ->add('telTuteur', TextType::class)
            ->add('entreprise',EntityType::class, array(
                'class' => Entreprise::class, //Option class pour aller chercher la classe qui va etre lier
                'choice_label'=>'nomEntreprise', //Option choice_label pour recup le nom de l'entreprise
            ))
            ->getForm();

        if($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));

            if($form->isSubmitted() && $form->isValid()){
                $tuteur = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($tuteur);
                $em->flush();
                return $this->redirectToRoute('tuteur');
            }
        }
        return $this->render('tuteur/ajout.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
