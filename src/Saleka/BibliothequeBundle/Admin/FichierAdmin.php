<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Fichier;
use Saleka\BibliothequeBundle\Entity\OeuvreEdition;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FichierAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('numOrdre')
            ->add('description')
            ->add('localisation')
            ->add('oeuvreEdition', null, [], EntityType::class, [
                'class' => OeuvreEdition::class,
                'choice_label' => 'libelle'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('numOrdre')
            ->add('description')
            ->add('localisation')
            ->add('oeuvreEdition')
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
            ->add('numOrdre')
            ->add('description')
            ->add('localisation')
            ->add('oeuvreEdition', 'sonata_type_model')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('numOrdre')
            ->add('description')
            ->add('localisation')
            ->add('oeuvreEdition')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Fichier ? $object->getDescription() : 'Fichier';
    }
}
