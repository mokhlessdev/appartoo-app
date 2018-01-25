<?php
//Acme\WebBundle\Form\Type\RegistrationFormType.php
namespace MarsupilamiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationType extends AbstractType
{

    private $class;
   public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('age')
                ->add('famille')
                ->add('nourriture')
                ->add('race')
        ;
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'registration',
            'csrf_protection' => false, //this line does the trick ;)
        ));
    }

    public function getParent()
    {
      return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
}