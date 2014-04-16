<?php
use Nette\Forms\Form;

class SystemPresenter extends BasePresenter
{
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
        $this->log();

        $this->redirect('System:bug');
    }

    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
        $template->registerHelper('UserName', function ($s) {
            $row = $this->database->table('users')->get($s);
            $data = $row["nick"];
            return $data;
        });
        return $template;
    }

    protected function createComponentBugForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addText('name', 'Název:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Název musí obsahovat nejméne 2 znaky', '2');

        $form->addTextArea('text', 'Popis:')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '15');

        $form->addSubmit('send', 'Nahlásit')
            ->setAttribute('class', 'btn btn-danger ');

        $form->onSuccess[] = $this->SendBugRefer;

        return $form;

    }

    protected function createComponentUpdateForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addText('name', 'Název:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Název musí obsahovat nejméne 2 znaky', '2');

        $form->addTextArea('text', 'Popis:')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '15');

        $form->addSubmit('send', 'Nahlásit')
            ->setAttribute('class', 'btn btn-primary ');

        $form->onSuccess[] = $this->SendUpdateRefer;

        return $form;

    }

    public function SendBugRefer($form)
    {
        $values = $form->getValues();
        $userId = $this->getUser()->id;

        $this->database->table('bugs')->insert(array(
            'name' => $values->name,
            'text' => $values->text,
            'time' => time(),
            'user' => $userId,
        ));

        $this->flashMessage('Bug nahlášen', 'alert-success');
        $this->redirect('Homepage:');
    }

    public function SendUpdateRefer($form)
    {
        $values = $form->getValues();
        $userId = $this->getUser()->id;

        $this->database->table('updates')->insert(array(
            'name' => $values->name,
            'text' => $values->text,
            'time' => time(),
            'user' => $userId,
        ));

        $this->flashMessage('Návrh odeslán', 'alert-success');
        $this->redirect('Homepage:');
    }

    public function renderShowUpdate($id)
    {
        if ($this->user->isInRole('admin')) {
            $this->template->data = $this->database->table('updates')->get($id);
        } else {
            $this->redirect('Homepage:');
        }
    }

    public function renderShowBug($id)
    {
        if ($this->user->isInRole('admin')) {
            $this->template->data = $this->database->table('bugs')->get($id);
        } else {
            $this->redirect('Homepage:');
        }
    }

    public function ActionSuccesBug($id)
    {
        if ($this->getUser()->isInRole('admin')) {

            $this->database->table('bugs')->where('id', $id)->update(array(
                'active' => 1
            ));

            $this->flashMessage("Bug opraven", 'alert-success');
            $this->redirect("System:ShowBug", $id);

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Homepage:');
        }

    }

    public function renderBugs()
    {
        if ($this->getUser()->isInRole('admin')) {

            $this->template->data = $this->database->table('bugs')->order("id DESC");

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Homepage:');
        }
    }
    public function renderUpdates()
    {
        if ($this->getUser()->isInRole('admin')) {

            $this->template->data = $this->database->table('updates')->order("id DESC");

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Homepage:');
        }
    }
}

