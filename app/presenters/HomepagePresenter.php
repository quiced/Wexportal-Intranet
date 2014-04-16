<?php

class HomepagePresenter extends BasePresenter
{

    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }
    public function renderDefault()
    {
        $this->log();
        if($this->user->isInRole('admin')){
            $this->template->bugs = $this->database->table('bugs')->where('active','0')->order('id DESC')->limit(10);
            $this->template->updates = $this->database->table('updates')->order('id DESC')->limit(10);
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
        return $template;
    }
}