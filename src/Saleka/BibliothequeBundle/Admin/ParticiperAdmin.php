<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Auteur;
use Saleka\BibliothequeBundle\Entity\Oeuvre;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ParticiperAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('satutAuteur')
            ->add('auteur', null, [], EntityType::class, [
                'class' => Auteur::class,
                'choice_label' => 'nomAuteur',
            ])
            ->add('oeuvre', null, [], EntityType::class, [
                'class' => Oeuvre::class,
                'choice_label' => 'titre',
            ])

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('auteur')
            ->add('oeuvre')
            ->add('satutAuteur')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('auteur', 'sonata_type_model')
            ->add('oeuvre', 'sonata_type_model')
            ->add('satutAuteur')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('auteur')
            ->add('oeuvre')
            ->add('satutAuteur')
        ;
    }
}
