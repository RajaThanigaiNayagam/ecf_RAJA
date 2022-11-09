<?php

namespace App\Form;

use App\Entity\ApiClients;
use App\Entity\ApiInstallPerm;
use App\Entity\ApiClientsGrants;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('branch_id', IntegerType::class, [
                'label' => ' ',
                'label_attr' => ['rows' => '10'],
              ])
            //->add('client_id', TextType::class, [
            //      'label' => ' ',
            //      'label_attr' => ['rows' => '10'],
            //    ])
            ->add('members_read', CheckboxType::class, [
              'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_write', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
              ->add('members_add', CheckboxType::class, [
              'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_payment_schedules_read', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_statistiques_read', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('members_subscription_read', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_schedules_read', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_schedules_write', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
            ->add('payment_day_read', CheckboxType::class, [
                'label' => ' ',
                'data' => false,
                'required' => 0,
                'value' => 1,
                'label_attr' => ['class' => 'switch-custom'],
              ])
              ->add('client_id', TextType::class, [
                'label' => ' ',
                'label_attr' => ['rows' => '10'],
              ])
            ->add('perms', EntityType::class, [
              'class' => ApiClientsGrants::class,
              'query_builder' => function (EntityRepository $er) use($options) {
                  $query = $er->createQueryBuilder('a');
                  if($options['clientid'] > 0 ) {
                      $query->where('a.client_id = :clientid')->setParameter('clientid', $options[('clientid')]);
                  }
                  return $query;
              },
              'choice_label' => 'perms',
              'mapped' => false,
              ])
            ->add('active', EntityType::class, [
              'class' => ApiClientsGrants::class,
              'query_builder' => function (EntityRepository $er) use($options) {
                  $query = $er->createQueryBuilder('a');
                  if($options['clientid'] > 0 ) {
                      $query->where('a.client_id = :clientid')->setParameter('clientid', $options[('clientid')]);
                  }
                  return $query;
              },
              'choice_label' => 'active',
              'mapped' => false,
            ])
            /*->add('client_id', EntityType::class, [
                  'class' => ApiClientsGrants::class,
                  'choice_label' => 'client_id',
                  'mapped' => false,
              ])*/

            ->add('Submit', SubmitType::class, [
                  'label' => 'Envoyer',
              ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApiInstallPerm::class,
            'clientid' => NULL
        ]);
    }
}
