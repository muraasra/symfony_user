<?php

namespace App\Form;

use App\Entity\User;
use PHPUnit\TextUI\XmlConfiguration\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File as FileFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File as ConstraintsFile;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('email')
        ->add('roles', ChoiceType::class, [
            'choices' => [
                'Admin' => 'ROLE_ADMIN',
                'User' => 'ROLE_USER',
            ],
            'multiple' => true,
                'expanded' => true,
        ])
        ->add('password', PasswordType::class, [
            'mapped' => false,
            'attr' => ['autocomplete' => 'new-password'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter a password',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    'max' => 4096,
                ]),
            ],
        ])
        ->add('isVerified', CheckboxType::class, [
            'required' => false,
        ])
        ->add('firstname', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'First name cannot be empty',
                ]),
            ],
        ])
        ->add('phonenumber', TelType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Please provide a phone number',
                ]),
            ],
        ])
        ->add('address', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => 'Address cannot be empty',
                ]),
            ],
        ])
        ->add('profilpicture', FileType::class, [
            'required' => false,
            'mapped' => false,
            'constraints' => [
                new ConstraintsFile([
                    'maxSize' => '2M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Please upload a valid image (JPEG or PNG)',
                ]),
            ],
        ])
    ;
}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
