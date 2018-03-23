<?php
namespace GemeenteAmsterdam\FixxxSchuldhulp\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use GemeenteAmsterdam\FixxxSchuldhulp\Entity\Voorlegger;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class VoorleggerMeterstandenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('energieBedrijf', TextType::class, [
            'required' => false
        ]);
        $builder->add('energieBedrijfKlantnummer', TextType::class, [
            'required' => false
        ]);
        $builder->add('energieBedrijfDatumOpname', DateType::class, [
            'required' => false,
            'html5' => true,
            'widget' => 'single_text'
        ]);
        $builder->add('energieBedrijfT1', NumberType::class, [
            'required' => false
        ]);
        $builder->add('energieBedrijfT2', NumberType::class, [
            'required' => false
        ]);
        $builder->add('energieBedrijfGas', NumberType::class, [
            'required' => false
        ]);
        $builder->add('warmteBedrijf', TextType::class, [
            'required' => false
        ]);
        $builder->add('warmteBedrijfKlantnummer', TextType::class, [
            'required' => false
        ]);
        $builder->add('warmteBedrijfDatumOpname', DateType::class, [
            'required' => false,
            'html5' => true,
            'widget' => 'single_text'
        ]);
        $builder->add('warmteBedrijfOpname', NumberType::class, [
            'required' => false
        ]);
        $builder->add('drinkwaterKlantnummer', TextType::class, [
            'required' => false
        ]);
        $builder->add('drinkwaterDatumOpname', DateType::class, [
            'required' => false,
            'html5' => true,
            'widget' => 'single_text'
        ]);
        $builder->add('drinkwaterOpname', NumberType::class, [
            'required' => false
        ]);
        $builder->add('aanvullendeInformatie', TextareaType::class, [
            'required' => false
        ]);
        $builder->add('file', FileType::class, [
            'required' => false,
            'mapped' => false
        ]);
        $builder->add('fileNaam', TextType::class, [
            'required' => false,
            'mapped' => false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Voorlegger::class);
        $resolver->setDefault('choice_translation_domain', false);
        $resolver->setDefault('disable_group', null);
    }
}