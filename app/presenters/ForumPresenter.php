<?php
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Forms\Form;

class ForumPresenter extends BasePresenter
{

    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
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

    public function renderDefault()
    {
        $this->template->data = $this->database->table('forum_theme')->order('id DESC');
    }

    protected function createComponentNewThemeForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addText('name', 'Název:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Skype musí obsahovat nejméne 2 znaky', '2');

        $form->addTextArea('text', 'Text:')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '15');

        $form->addSubmit('send', 'Založit')
            ->setAttribute('class', 'btn btn-primary ');
        $form->onSuccess[] = $this->AddNewTheme;

        return $form;
    }

    public function AddNewTheme($form)
    {
        $values = $form->getValues();
        $userId = $this->getUser()->id;

        $this->database->table('forum_theme')->insert(array(

            'name' => $values->name,
            'text' => $values->text,
            'user' => $userId,
            'time' => time()
        ));

        $this->flashMessage('Téma přidáno', 'alert-success');
        $this->redirect('Forum:');

    }

    public function renderTheme($id)
    {
        $this->template->theme = $this->database->table('forum_theme')->get($id);
        $this->template->response = $this->database->table('forum_response')->where('id_theme', $id)->order('id');
    }

    protected function createComponentResponseForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addTextArea('text')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '15');

        $form->addSubmit('send', 'Odpovědět')
            ->setAttribute('class', 'btn btn-primary btn-outline');

        $form->onSuccess[] = $this->AddNewResponse;

        return $form;
    }

    public function AddNewResponse($form)
    {
        $values = $form->getValues();
        $id = $this->getParameter('id');
        $this->database->table('forum_response')->insert(array(
            'id_theme' => $id,
            'text' => $values->text,
            'user' => $this->getUser()->id,
            'time' => time()
        ));


        $this->redirect('Forum:theme', $id);
    }

    public function ActionDeleteTheme($id)
    {
        $id = $this->getParameter('id');
        if ($this->getUser()->isInRole('admin')) {

            $this->database->table('forum_theme')->where('id', $id)->delete();
            $this->database->table('forum_response')->where('id_theme', $id)->delete();

            $this->flashMessage("Téma odsraněno", 'alert-success');
            $this->redirect('Forum:');

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Forum:');
        }
    }

    public function ActionStopTheme($id)
    {
        $id = $this->getParameter('id');
        if ($this->getUser()->isInRole('admin')) {

            $this->database->table('forum_theme')->where('id', $id)->update(array(
                'active' => 0
            ));

            $this->flashMessage("Téma ukončeno", 'alert-success');
            $this->redirect('Forum:theme',$id);

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Forum:');
        }
    }
    public function ActionStartTheme($id)
    {
        $id = $this->getParameter('id');
        if ($this->getUser()->isInRole('admin')) {

            $this->database->table('forum_theme')->where('id', $id)->update(array(
                'active' => 1
            ));

            $this->flashMessage("Téma ukončeno", 'alert-success');
            $this->redirect('Forum:theme',$id);

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Forum:');
        }
    }
}