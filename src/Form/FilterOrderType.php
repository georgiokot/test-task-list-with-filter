<?php

namespace App\Form;

use App\Entity\Customers;
use App\Entity\Vendors;
use App\Util\Filter;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('price_min', NumberType::class, array(
                    'required' => false,
                    'mapped' => true
                ))
                ->add('price_max', NumberType::class, array(
                    'required' => false
                ))
                ->add('vendors', EntityType::class, array(
                    'class' => Vendors::class,
                    'choice_label' => 'name',
                    'required'   => false,
                ))
                ->add('date_start', DateType::class, array(
                    'widget' => 'single_text',
                    'required' => false,
                ))
                ->add('date_end', DateType::class, array(
                    'widget' => 'single_text',
                    'required' => false,
                ))
                ->add('country', EntityType::class, array(
                    'class' => Customers::class,
                    'query_builder' => function(EntityRepository $er){
                        return $er->createQueryBuilder('customer')
                            ->groupBy('customer.country');
                    },
                    'choice_label' => 'country',
                    'required' => false,
                ))
            ->setMethod('GET')
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Filter::class,
            'attr' => array(
                'id' => 'form_filter'
            ),
        ]);
    }
}
