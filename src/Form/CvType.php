<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('model')
            ->add('title')
            ->add('jobCv')
            ->add('about')
            ->add('photoFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => false,
                'delete_label' => 'Remove the image',
                'download_uri' => false,
                'image_uri' => false,
                'asset_helper' => false,
            ])
            // ->add('createdAt')
            // ->add('updatedAt')
            // ->add('shortUrl')
            // ->add('userId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
