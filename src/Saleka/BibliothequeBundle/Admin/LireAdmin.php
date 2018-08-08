<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Fichier;
use Saleka\BibliothequeBundle\Entity\Lecteur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LireAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('dateLecture')
            ->add('pourcentageLecture')
            ->add('lecteur', null, [], EntityType::class, [
                'class' => Lecteur::class,
                'choice_label' => 'nomLecteur',
            ])
            ->add('fichier', null, [], EntityType::class, [
                'class' => Fichier::class,
                'choice_label' => 'description',
            ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('dateLecture')
            ->add('pourcentageLecture')
            ->add('lecteur')
            ->add('fichier')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('dateLecture')
            ->add('pourcentageLecture')
            ->add('lecteur', 'sonata_type_model')
            ->add('fichier', 'sonata_type_model');
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('dateLecture')
            ->add('pourcentageLecture')
            ->add('lecteur')
            ->add('fichier');
    }
}
