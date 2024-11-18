<?php

namespace App\Form;

use App\Entity\Films;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

class FilmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description', TextareaType::class)
            ->add('age_mini', IntegerType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 18
                ]
            ])
            //->add('note')
            ->add('coup_coeur', CheckboxType::class, [
                'required' => false,
            ])
            ->add('date_sortie', null, [
                'widget' => 'single_text',
            ])
            ->add('duree', IntegerType::class)
            ->add('Genre', ChoiceType::class, [
                'choices' => [
                    'Action' => 'action',
                    'Comédie' => 'comedy',
                    'ScienceFiction' => 'sf'
                ],
                'multiple' => true
            ])
            ->add('affiche', FileType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez carger une affiche de film.',
                    ]),
                    new File([
                        'maxSize' => '1M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un fichier au format WEBP, JPEG ou PNG.'

                    ])
                ]
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Films::class,
        ]);
    }
}
