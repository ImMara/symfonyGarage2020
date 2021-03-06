<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CatalogueType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque',TextType::class,$this->getConfiguration('marque','Marque de votre voiture'))
            ->add('modele',TextType::class,$this->getConfiguration('modele','Modéle de votre voiture'))
            ->add('cover',FileType::class,$this->getConfiguration('cover','Veuillez entrez l\'adresse de votre image'))
            ->add('km',IntegerType::class,$this->getConfiguration('Nombre de km','km au compteur'))
            ->add('prix',MoneyType::class, $this->getConfiguration('Prix de votre voiture','indiquer le prix que vous voulez'))
            ->add('proprios',IntegerType::class,$this->getConfiguration('Nombre de proprietaire','indiquez un nombre'))
            ->add('cylindre',IntegerType::class,$this->getConfiguration('Cylindrée','cylindrée moteur de votre voiture'))
            ->add('puissance',IntegerType::class,$this->getConfiguration('Puissance en chevaux','exemple : 450'))
            ->add('carburant',TextType::class,$this->getConfiguration('Carburant','essence ou diesel?'))
            ->add('dateMiseCirculation',DateType::class,$this->getConfiguration('Date de premiere mise en circulation',''))
            ->add('transmission',IntegerType::class,$this->getConfiguration('roue motrice','exemple : 2 ou 4'))
            ->add('description',TextareaType::class, $this->getConfiguration('Description','Déscription détaillée de votre voiture'))
            ->add('options',TextareaType::class,$this->getConfiguration('Option de votre voiture','vos options ici'))
            ->add('slug', TextType::class, $this->getConfiguration('Slug','Adresse web (automatique)',[
                'required' => false,
                'disabled'=> true
            ]))
            ->add('images', CollectionType::class,
                [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }

}
