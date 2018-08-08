<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Auteur;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AuteurAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('nomAuteur')
            ->add('prenomAuteur')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('nomAuteur')
            ->add('prenomAuteur')
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
            ->add('nomAuteur')
            ->add('prenomAuteur')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('nomAuteur')
            ->add('prenomAuteur')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Auteur ? $object->getNomAuteur() : 'Auteur';
    }
}
