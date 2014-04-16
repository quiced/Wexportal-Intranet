<?php

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    public function log()
    {
        if ($this->getUser()->isLoggedIn() == false) {
            $this->redirect('Sign:in');
        }
    }

    public function beforeRender()
    {
        if ($this->getUser()->isLoggedIn() == false) {
            if ($this->getPresenter()->name != "Sign") {
                $this->redirect('Sign:in');
            }
        }

    }
}
