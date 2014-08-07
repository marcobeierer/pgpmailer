<?php
namespace League\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

		$builder
			->add('name', 'text', array('label' => 'Name'))
			->add('email', 'email', array('label' => 'Email'))
			->add('subject', 'text', array('label' => 'Subject'))
			->add('message', 'textarea', array(
				'label' => 'Message',
				'attr' => array(
					'rows' => '7')))
			->add('submit', 'submit', array(
				'label' => 'Send email',
				'attr' => array(
					'class' => 'btn btn-default')));
    }

	public function getName() {
		return 'contact_form';
	}
}
?>
