<?php
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Forms\Form;

class MessengerPresenter extends BasePresenter
{

    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function rennderNewMessage()
    {

    }

    protected function createComponentNewMessageForm()
    {

        $form = new Nette\Application\UI\Form;

        $form->addText('receiver', 'Příjemci: (nick) - oddělujte čárkou')
            ->setRequired()
            ->setAttribute('class', 'form-control');
        $form->addTextArea('text')
            ->setRequired()
            ->setAttribute('class', 'form-control');
        $form->addSubmit('send', 'Odeslat zprávu')
            ->setAttribute('class', 'btn btn-primary');

        $form->onSuccess[] = $this->SendMessage;
        return $form;

    }

    public function SendMessage($form)
    {
        $this->log();

        $values = $form->getValues();
        $user = $this->getUser()->id;
        $time = time();
        $receivers = explode(',', $values->receiver);
        $receiver = $values->receiver;

        $data = $this->database->table('users');


        $receiver = $a["id"];

        $this->database->table('messenger')->insert(array(
            'sender' => $user,
            'receiver' => $receiver,
            'text' => $values->text,
            'read' => '0',
            'time' => $time
        ));

    }
}