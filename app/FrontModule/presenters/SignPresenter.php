<?php

namespace FrontModule;

use Nette\Application\UI;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {


    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignInForm() {
        $form = new UI\Form;
        $form->addText('username', 'Jméno:')
            ->setRequired('Vyplňte Vaší přezdívku.');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Vyplňte Vaše heslo.');

        $form->addSubmit('send', 'Přihlásit se');

        // call method signInFormSucceeded() on success
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }

    public function signInFormSucceeded($form) {
        $values = $form->getValues();

        try {
            $this->getUser()->login($values->username, $values->password);
            $this->flashMessage('Byl jste přihlášen', 'info');
            $this->redirect(':Admin:Admin:');

        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }

}
