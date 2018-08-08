<?php

namespace Saleka\BibliothequeBundle\Admin;

use Saleka\BibliothequeBundle\Entity\Editeur;
use Saleka\BibliothequeBundle\Entity\Edition;
use Saleka\BibliothequeBundle\Entity\NatureEdition;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EditionAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
//            ->add('id')
            ->add('isbn')
            ->add('datePublication')
            ->add('lieuPublication')
            ->add('nbrPages')
            ->add('couverture')
            ->add('duree')
            ->add('numEdition')
            ->add('editeur', null, [], EntityType::class, [
                'class' => Editeur::class,
                'choice_label' => 'nomEditeur',
            ])
            ->add('natureEdition', null, [], EntityType::class, [
                'class' => NatureEdition::class,
                'choice_label' => 'intitule',
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
            ->add('isbn')
            ->add('datePublication')
            ->add('lieuPublication')
            ->add('nbrPages')
            ->add('couverture')
            ->add('duree')
            ->add('numEdition')
            ->add('editeur')
            ->add('natureEdition')
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
            ->add('isbn')
            ->add('datePublication')
            ->add('lieuPublication')
            ->add('nbrPages')
            ->add('couverture')
            ->add('duree')
            ->add('numEdition')
            ->add('editeur','sonata_type_model')
            ->add('natureEdition', 'sonata_type_model')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
//            ->add('id')
            ->add('isbn')
            ->add('datePublication')
            ->add('lieuPublication')
            ->add('nbrPages')
            ->add('couverture')
            ->add('duree')
            ->add('numEdition')
            ->add('editeur')
            ->add('natureEdition')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Edition ? $object->getNumEdition() : 'Édition';
    }
}
