<?php
namespace FastForward\ManageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface; 

/**
 * Description of SupportForm
 *
 * @author azazello
 */
class AuthorsForm extends AbstractType {
    
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {                                     
        
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
        $builder->add('middleName', 'text');
        $builder->add('namePrefix', 'text');
        $builder->add('nameSuffix', 'text');
        $builder->add('bio', 'textarea');        
        $builder->add('status', 'number');
        $builder->add('tags', 'choice', array('choices' => array('1' => 'first', '2' => 'second', '3' => 'third', '4' => 'fourth', 
            '5' => 'fifth', '6' => 'sixth')));
        $builder->add('comment', 'textarea');
        $builder->add('pictureFile', 'file');
    }

    public function getName()
    {
        return 'authors';
    }
}

?>
