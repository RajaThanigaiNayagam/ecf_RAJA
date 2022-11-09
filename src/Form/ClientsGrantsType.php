<?php

namespace App\Form;

use App\Entity\ApiClients;
use App\Entity\ApiClientsGrants;
use App\Entity\ApiInstallPerm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientsGrantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('install_id', TextType::class)
            ->add('active', TextType::class)
            ->add('perms', TextType::class)
            ->add('branch_id', TextType::class)
            ->add('client_id', EntityType::class, [
                'class' => ApiClients::class,
                'choice_label' => 'install_id',
            ])
            ->add('install_id', EntityType::class, [
                'class' => ApiInstallPerm::class,
                'choice_label' => 'install_id',
            ])
            
            ->add('Submit', SubmitType::class, [
              'label' => 'Envoyer',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApiClientsGrants::class,
        ]);
    }
}
