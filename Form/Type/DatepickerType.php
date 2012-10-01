<?php
/**
 * Created by JetBrains PhpStorm.
 * User: firesnake
 * Date: 22.02.12
 * Time: 17:14
 */

namespace Ailove\FormTypesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class DatepickerType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->resetClientTransformers();
        $builder->appendClientTransformer(new DatepickerTransformer());
        $builder->setAttribute('locale', $options['locale']);
        $builder->setAttribute('range', $options['range']);

    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'range' => false,
            'locale' => 'en-GB',
            'format' => 'yyyy-MM-dd',
        );
    }

    public function getParent()
    {
        return 'number';
    }

    public function getName()
    {
        return 'sonata_type_datepicker';
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {

        $view->setAttribute('class', 'sonata-datepicker');


        $view->set('locale', $form->getAttribute('locale'));
        $view->set('range', $form->getAttribute('range'));
    }
}
