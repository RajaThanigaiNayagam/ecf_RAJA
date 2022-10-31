<?php

namespace App\Form;

use App\Entity\ApiInstallPerm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('branch_id', TextType::class, [
                'label' => 'Entrer l\'Identification du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('client_id', TextType::class, [
                'label' => 'Entrer l\'Identification du client',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('members_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_write', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_add', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_payment_schedules_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_statistiques_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_subscription_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_schedules_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_schedules_write', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_day_read', CheckboxType::class, [
                'label' => 'Choissez pour activé ou désactivé le client',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('install_id', TextType::class, [
                'label' => 'Entrer l\'Identification du client',
                'label_attr' => ['rows' => '10'],
              ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApiInstallPerm::class,
        ]);
    }
}
