<?php

use Nette\Application\UI;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    /**
     * Sign-in form factory.
     * @return Nette\Application\UI\Form
     */
    public function renderDefault()
    {
        if ($this->getUser()->isLoggedIn() == false) {
            $this->redirect('Sign:in');
        }
    }

    protected function createComponentSignInForm()
    {
        $form = new UI\Form;
        $form->addText('username', 'Nick:')
            ->setRequired('Zadejte nick')
            ->setAttribute('class', 'form-control');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Zadejte heslo')
            ->setAttribute('class', 'form-control');

        $form->addCheckbox('remember', 'Přihásit na vždy');

        $form->addSubmit('send', 'Sign in')
            ->setAttribute('class', 'btn btn-lg btn-primary btn-block');

        // call method signInFormSucceeded() on success
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }


    public function signInFormSucceeded($form)
    {
        $values = $form->getValues();

        if ($values->remember) {
            $this->getUser()->setExpiration('14 days', FALSE);
        } else {
            $this->getUser()->setExpiration('20 minutes', TRUE);
        }

        try {
            $this->getUser()->login($values->username, $values->password);
            $this->database->table('users')->where('id', $this->getUser()->id)->update(array(
                'lastLogin' => time()
            ));

            $id = $this->getUser()->id;
            $data = $this->database->table('users')->get($id);
            if ($data['active'] == 1) {
                $this->redirect('Homepage:');
            } else {
                $this->getUser()->logout();
                $this->flashMessage("Váš účet byl odstaven", 'alert alert-danger');
                $this->redirect('Sign:in');
            }


        } catch (Nette\Security\AuthenticationException $e) {
            $this->flashMessage("Nesprávné přihlašovací jméno nebo heslo.", 'alert alert-danger');
        }

    }


    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.', 'alert alert-success');
        $this->redirect('Sign:in');
    }

}
