<?php

namespace App\Form;

use App\Entity\ApiClients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client_id', TextType::class, [
                'label' => 'Entrer l\'Identification du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('client_secret', TextType::class, [
                'label' => 'Entrer la code secret du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('client_name', TextType::class, [
                'label' => 'Entrer le nom du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('client_mail', UrlType::class, [
                'label' => 'Entrer l\'E-mail du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('active', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('short_description', TextType::class, [
                'label' => 'Entrer le desctiption courte du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('full_description', TextType::class, [
                'label' => 'Entrer le description complete client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('logo_url', TextType::class, [
                'label' => 'Entrer l\'URL logo du client client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('url', TextType::class, [
                'label' => 'Entrer l\'URL du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('dpo', TextType::class, [
                'label' => 'Entrer le DPO du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('technical_contact', TextType::class, [
                'label' => 'Entrer le contact technique du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('commercial_contact', TextType::class, [
                'label' => 'Entrer le contact commercial du client',
                'label_attr' => ['rows' => '10'],
              ])
            //->add('install_id', TextType::class)
            ->add('Submit', SubmitType::class, [
                'label' => 'Envoyer',
              ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApiClients::class,
        ]);
    }
}
