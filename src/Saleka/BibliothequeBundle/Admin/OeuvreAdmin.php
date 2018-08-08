<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Categorie;
use Saleka\BibliothequeBundle\Entity\MotCle;
use Saleka\BibliothequeBundle\Entity\Oeuvre;
use Saleka\BibliothequeBundle\Entity\OeuvreEdition;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OeuvreAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('titre')
            ->add('sousTitre')
            ->add('resume')
            ->add('categories', null, [], EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'nomCategorie',
            ])
            ->add('motCles', null, [], EntityType::class, [
                'class' => MotCle::class,
                'choice_label' => 'tag'
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->addIdentifier('titre')
            ->add('sousTitre')
            ->add('resume')
            ->add('categories')
            ->add('motCles')
            ->add('oeuvreEditions')
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
            ->add('titre')
            ->add('sousTitre')
            ->add('resume')
            ->add('categories', 'sonata_type_model', array('multiple' => true), ['required' => false])
            ->add('motCles', 'sonata_type_model', array('multiple' => true), ['required' => false])
            ->add('oeuvreEditions', 'sonata_type_model', array('multiple' => true), ['required' => false])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('titre')
            ->add('sousTitre')
            ->add('resume')
            ->add('categories')
            ->add('motCles')
            ->add('oeuvreEditions')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Oeuvre ? $object->getTitre() : 'Oeuvre';
    }
}
