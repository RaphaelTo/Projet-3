<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Entity\Tuteur;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\EntrepriseRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Serializer;
;


class FoundStageController extends Controller
{
    /**
     * @Route("/found", name="found_stage")
     */
    public function index(Request $request)
    {
        $stage = new Stage();


        $serializer = new Serializer(array(new DateTimeNormalizer('d-m-Y')));
        $dateAsString = $serializer->normalize(new \DateTime());


        $stage->setEleve(' ');
        $stage->setTuteur(' ');
        $stage->setDateAjout($dateAsString);

        $form = $this->createFormBuilder($stage)
            ->add('Eleve', EntityType::class, array (
                'class' => Eleve::class,
                'choice_label' => 'nom',
               // 'choice_label' => 'prenom',
            ))
            ->add('Tuteur', EntityType::class, array(
                'class' => Tuteur::class,
                'choice_label' => 'nomTuteur',
            ))
            ->getForm();

        if($request->isMethod('POST')){
            $form->submit($request->request->get($form->getName()));

            if($form->isSubmitted() && $form->isValid()){
                $stage = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($stage);
                $em->flush();
                return $this->redirectToRoute('entreprise');
            }
        }
        return $this->render('found_stage/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stage", name="stage")
     */
    public function stage(RegistryInterface $doctrine){
        $stages = $doctrine->getRepository(Stage::class)->findAll();

        return $this->render("found_stage/liste.html.twig", compact("stages"));
    }


}
