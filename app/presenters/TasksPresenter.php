<?php
use Nette\Forms\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

class TasksPresenter extends BasePresenter
{

    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
        $this->log();
        $this->template->tasks = $this->database->table('tasks')
            ->order('id')
            ->limit('100');

    }

    public function renderNew()
    {
        $this->log();
    }

    protected function createComponentNewTaskForm()
    {

        $user = array();

        $items = $this->database->table('users');
        foreach ($items as $item) {
            $user[$item->id] = $item->nick;
        }

        $form = new Nette\Application\UI\Form;

        $form->addText('name', 'Název:')
            ->setRequired('Vyplňte pole název')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Nazev musí obsahovat nejméne 4 znaky', '4');

        $form->addText('endtime', 'Plánovaný čas dokončení')
            ->setRequired('Vyplňte pole plánovaný čas dokončení')
            ->setAttribute('class', 'form-control datepicker');

        $form->addMultiSelect('worker', 'Přidat pracovníka:', $user)
            ->setPrompt('vyberte uživatele')
            ->setAttribute('class', 'form-control');

        $form->addTextArea('text', 'Text:')
            ->addRule(Form::MIN_LENGTH, 'Vyplňte pole text', '1')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '20');


        $form->addSubmit('send', 'Přidat úkol')
            ->setAttribute('class', 'btn btn-primary');


        $form->onSuccess[] = $this->AddNewTask;

        return $form;
    }

    public function AddNewTask($form)
    {
        if ($this->getUser()->isLoggedIn()) {
            $values = $form->getValues();

            $time = time();
            $userId = $this->getUser()->id;

            $worker = '';
            $workers = $values->worker;
            foreach ($workers as $item) {
                $worker .= $item . ';';
            }


            $task = $this->database->table('tasks')->insert(array(
                'user_id' => $userId,
                'name' => $values->name,
                'text' => $values->text,
                'time' => $time,
                'worker' => $worker,
                'endtime' => $values->endtime,
            ));

            //Odesílání notifikace o novém úkolu
            $url = $this->getHttpRequest()->getUrl()->host;
            foreach($workers as $worker_id){
            if($worker_id!=$userId){
            $email = $this->database->table('users')->where('id', $worker_id)->fetch();
            $mail = new Message;
            $mail->setFrom('Intranet Wexweb <info@wexportal.net>')
                ->addTo($email->email)
                ->setSubject('Nový úkol')
                ->setHtmlBody('
                    <h1>Dobrý den,</h1>
                    <p>byl Vám vytvořen nový úkol. Další informace naleznete v administraci.</p>
                    <p>Úkol si můžete prohlédnout zde: <a href="http://' . $url . '/tasks/show?task=' . $task->id . '">Přejít na úkol</a></p>
                    <p style="font-size:12px">Zpráva byla automaticky vygenerována systémem prosím neodepisujte na ní</p>
                ');

            $mailer = new SendmailMailer;
            $mailer->send($mail);
            }
            }
            //konec odesílání notifikace

            $this->flashMessage("Úkol přidán", 'alert-success');
            $this->redirect('Tasks:show', $task->id);


        } else {
            $this->log();
        }
    }

    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
        $template->registerHelper('UserName', function ($s) {
            $row = $this->database->table('users')->get($s);
            $data = $row["nick"];
            return $data;
        });
        $template->registerHelper('WorkerName', function ($s) {
            $data = '';
            $sel = explode(';', $s);
            for ($i = 0; $i < count($sel) - 1; $i++) {
                $row = $this->database->table('users')->get($sel[$i]);
                $data .= $row["nick"] . ", ";
            }
            return $data;
        });
        $template->registerHelper('RowStatus', function ($s) {
            $data = '';
            $sel = explode(';', $s);
            for ($i = 0; $i < count($sel) - 1; $i++) {
                if ($sel[$i] == $this->getUser()->id) {
                    $data = 'class="warning"';
                }
            }
            return $data;
        });
        $template->registerHelper('RowStatus2', function ($s) {
            $data = '';
            $sel = explode(';', $s);
            $ok = false;
            for ($i = 0; $i < count($sel) - 1; $i++) {
                if ($sel[$i] == $this->getUser()->id) {
                    $ok = true;
                }
            }
            if($ok == false){
                $data = 'class="danger"';
            }
            return $data;
        });
        return $template;
    }


    public function renderShow($task)
    {
        if ($this->getUser()->isLoggedIn()) {
            $taskData = $this->database->table('tasks')->get($task);
            if (!$taskData) {
                $this->error('Stránka nenalezena');
            } else {
                $this->template->taskData = $taskData;

                $this->template->chat = $this->database->table('chat_message')
                    ->where('task_id', $task)
                    ->order('time DESC');

                $readers = $taskData->read;
                $reader = explode(';', $readers);
                $user = $this->getUser()->id;
                $new = true;

                for ($i = 0; $i < count($reader) - 1; $i++) {
                    if ($reader[$i] == $user) {
                        $new = false;
                    }
                }

                if ($new == true) {
                    $readers .= $user . ';';
                    $this->database->table('tasks')->where('id', $task)->update(array(
                        'read' => $readers
                    ));
                }

            }

        } else {
            $this->log();
        }
    }

    protected function createComponentChatForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addTextArea('content')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control text')
            ->setAttribute('rows', '5');
        $form->addSubmit('send', 'Odeslat')
            ->setAttribute('class', 'btn btn-primary btn-right');

        $form->onSuccess[] = $this->AddChatMessage;

        return $form;
    }

    public function AddChatMessage($form)
    {
        if ($this->getUser()->isLoggedIn()) {
            $values = $form->getValues();
            $taskId = $this->getParameter('task');

            if ($taskId) {
                $time = time();
                $userId = $this->getUser()->id;

                $post = $this->database->table('chat_message')->insert(array(
                    'user_id' => $userId,
                    'message' => $values->content,
                    'task_id' => $taskId,
                    'time' => $time
                ));

                $readers = $userId . ';';
                $this->database->table('tasks')->where('id', $taskId)->update(array(
                    'read' => $readers
                ));

                //Notifikace o novém komentáři
                $task = $this->database->table('tasks')->where('id', $taskId)->fetch();
                $workers_id = explode(';', $task->worker);
                $url = $this->getHttpRequest()->getUrl()->host;
                foreach($workers_id as $worker_id){
                    if(!empty($worker_id)){
                        if($worker_id != $userId){
                    $email = $this->database->table('users')->where('id', $worker_id)->fetch();
                    $mail = new Message;
                    $mail->setFrom('Intranet Wexweb <info@wexportal.net>')
                        ->addTo($email->email)
                        ->setSubject('Nový komentář u tvého úkolu')
                        ->setHtmlBody('
                    <p>Dobrý den,</p>
                    <p>u Vašeho úkolu se objevil nový komentář, který je určitě důležitý, tak si ho co nejdříve přečtěte.</p>
                    <p>Komentář si můžete prohlédnout zde: <a href="http://' . $url . '/tasks/show?task=' . $taskId . '">Přejít na komentář</a></p>
                    <p style="font-size:12px">Zpráva byla automaticky vygenerována systémem prosím neodepisujte na ní</p>
                ');

                    $mailer = new SendmailMailer;
                    $mailer->send($mail);
                }
                }
                }
                //konec odesílání notifikace

                $this->flashMessage("Zpráva přidána", 'alert-success');
                $this->redirect('show', $post->task_id);
            } else {
                $this->flashMessage("Úkol nenalezen", 'alert-danger');
                $this->redirect('Tasks:');
            }

        } else {
            $this->log();
        }
    }

    public function renderEdit($id)
    {
        $this->log();

        $data = $this->database->table('tasks')->get($id);


        if (($this->getUser()->id == $data->user_id) || ($this->getUser()->isInRole('admin'))) {

        } else {
            $this->redirect('Tasks:');
        }
    }

    protected function createComponentEditTaskForm()
    {

        $user = array();

        $items = $this->database->table('users');
        foreach ($items as $item) {
            $user[$item->id] = $item->nick;
        }

        $taskId = $this->getParameter('id');
        $data = $this->database->table('tasks')->get($taskId);

        $selected = array();

        $sel = explode(';', $data->worker);

        for ($i = 0; $i < count($sel) - 1; $i++) {
            $selected[] = $sel[$i];
        }


        $form = new Nette\Application\UI\Form;

        $form->addText('name', 'Název:')
            ->setRequired('Vyplňte pole název')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Nazev musí obsahovat nejméne 4 znaky', '4')
            ->setDefaultValue($data->name);

        $form->addText('endtime', 'Plánovaný čas dokončení: ' . $data->endtime)
            ->setRequired('Vyplňte pole plánovaný čas dokončení')
            ->setAttribute('class', 'form-control datespicker')
            ->setDefaultValue($data->endtime);

        $form->addMultiSelect('worker', 'Přidat pracovníka:', $user)
            ->setPrompt('vyberte uživatele')
            ->setAttribute('class', 'form-control')
            ->setDefaultValue($selected);

        $form->addHidden('id')
            ->setDefaultValue($data->id);

        $form->addTextArea('text', 'Text:')
            ->addRule(Form::MIN_LENGTH, 'Vyplňte pole text', '1')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '20')
            ->setDefaultValue($data->text);


        $form->addSubmit('send', 'Upravit úkol')
            ->setAttribute('class', 'btn btn-primary');


        $form->onSuccess[] = $this->EditTask;

        return $form;
    }

    public function EditTask($form)
    {
        $values = $form->getValues();
        $id = $values->id;

        $this->log();

        $data = $this->database->table('tasks')->get($id);
        $task = $data;

        if (($this->getUser()->id == $data->user_id) || ($this->getUser()->isInRole('admin'))) {

            $worker = '';
            $workers = $values->worker;
            foreach ($workers as $item) {
                $worker .= $item . ';';
            }

            $this->database->table('tasks')->where('id', $id)->update(
                array(
                    'name' => $values->name,
                    'text' => $values->text,
                    'worker' => $worker,
                    'endtime' => $values->endtime,
                    'read' => $this->getUser()->id . ';'

                ));


            $this->flashMessage("Úkol upraven", 'alert alert-success');
            $this->redirect('Tasks:show', $data->id);

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Tasks:');
        }

    }

    public function ActionDeleteTask($id)
    {
        $data = $this->database->table('tasks')->get($id);
        if (($this->getUser()->id == $data->user_id) || ($this->getUser()->isInRole('admin'))) {


            $this->database->table('tasks')->where('id', $id)->delete();
            $this->database->table('chat_message')->where('task_id', $id)->delete();

            $this->flashMessage("Úkol smazán", 'alert-success');
            $this->redirect('Tasks:');

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
            $this->redirect('Tasks:');
        }
    }

}