<?php
use Nette\Forms\Form;

class ChatPresenter extends BasePresenter
{
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
        $this->log();

        $this->template->users = $this->database->table('users')
            ->order('id')
            ->where('active', '1');
    }

}
