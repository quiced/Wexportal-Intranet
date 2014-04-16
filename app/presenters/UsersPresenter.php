<?php
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Forms\Form;

class UsersPresenter extends BasePresenter
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

    protected function createTemplate($class = NULL)
    {
        $template = parent::createTemplate($class);
        $template->registerHelper('Kraj', function ($s) {
            $kraje = array(
                14 => 'Hlavní město Praha',
                1 => 'Jihočeský kraj',
                2 => 'Jihomoravský kraj',
                3 => 'Karlovarský kraj',
                4 => 'Královéhradecký kraj',
                5 => 'Liberecký kraj',
                6 => 'Moravskoslezský kraj',
                7 => 'Olomoucký kraj',
                8 => 'Pardubický kraj',
                9 => 'Plzeňský kraj',
                10 => 'Středočeský kraj',
                11 => 'Ústecký kraj',
                12 => 'Kraj Vysočina',
                13 => 'Zlínský kraj'
            );
            $data = $kraje[$s];


            return $data;
        });
        return $template;
    }

    public function renderList()
    {
        $this->log();
        if ($this->getUser()->isInRole('admin')) {
            $this->template->users = $this->database->table('users')
                ->order('id')
                ->where('active', '1');
        } else {
            $this->redirect('Users:');
        }
    }


    public function renderNew()
    {
        $this->log();
        if ($this->getUser()->isInRole('admin')) {
            $this->template->users = $this->database->table('users')
                ->order('id');
        } else {
            $this->redirect('Users:');
        }
    }

    protected function createComponentNewUserForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addText('nick', 'Nick:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Nick musí obsahovat nejméne 4 znaky', '4');
        $form->addText('email', 'E-mail')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::EMAIL, 'Neplatný formát emailu');


        $form->addSubmit('send', 'Přidat uživatele')
            ->setAttribute('class', 'btn btn-primary');

        $form->onSuccess[] = $this->AddNewUser;

        return $form;

    }


    public function AddNewUser($form)
    {
        if ($this->getUser()->isInRole('admin')) {
            $values = $form->getValues();

            $pass = pass();
            $secure = secure($pass);

            $test1 = $this->database->table('users')
                ->where("nick", $values->nick)
                ->count("*");

            $test2 = $this->database->table('users')
                ->where("email", $values->email)
                ->count("*");


            if ($test1 == 0 && $test2 == 0) {
                $this->database->table('users')->insert(array(
                    'nick' => $values->nick,
                    'email' => $values->email,
                    'pass' => $secure,
                    'role' => 'user'
                ));

                $mail = new Message;
                $mail->setFrom('Intranet Wexweb <info@wexweb.cz>')
                    ->addTo($values->email)
                    ->setSubject('Přiřazení účtu wexweb intranetu')
                    ->setHtmlBody('
                    <h1>Dobrý den</h1>
                    <p>Byl vám přiřazen účet na <a href="">intranetu</a> firmy wexweb</p>
                    <p>Pihlašovací údaje jsou:<br>
                        <table style="border: none">
                        <tr><td>Nick:</td><td>' . $values->nick . '</td></tr>
                        <tr><td>Heslo:</td><td>' . $pass . '</td></tr>
                        </table>
                    </p>
                    <p style="font-size:12px">Zpráva byla automaticky vygenerována systémem prosím neodepisujte na ní</p>
                ');

                $mailer = new SendmailMailer;
                $mailer->send($mail);

                $this->flashMessage("Uživatel přidán", 'alert alert-success');
            } else {
                $this->flashMessage("Chyba uživatel s těmito údaji je již v databázi", 'alert-danger');
            }
            $this->redirect('this');
        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
        }
    }

    public function renderProfile()
    {
        $this->log();
    }

    protected function createComponentUpdateProfileForm()
    {
        $userId = $this->getUser()->id;
        $data = $this->database->table('users')->get($userId);

        $kraje = array(
            14 => 'Hlavní město Praha',
            1 => 'Jihočeský kraj',
            2 => 'Jihomoravský kraj',
            3 => 'Karlovarský kraj',
            4 => 'Královéhradecký kraj',
            5 => 'Liberecký kraj',
            6 => 'Moravskoslezský kraj',
            7 => 'Olomoucký kraj',
            8 => 'Pardubický kraj',
            9 => 'Plzeňský kraj',
            10 => 'Středočeský kraj',
            11 => 'Ústecký kraj',
            12 => 'Kraj Vysočina',
            13 => 'Zlínský kraj'
        );
        $form = new Nette\Application\UI\Form;

        $form->addText('nick', 'Nick:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Nick musí obsahovat nejméne 4 znaky', '4')
            ->setValue($data->nick);

        $form->addText('name', 'Jméno:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Jméno musí obsahovat nejméne 3 znaky', '3')
            ->setValue($data->name);

        $form->addText('surname', 'Přijmení:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Přijmení musí obsahovat nejméne 2 znaky', '2')
            ->setValue($data->surname);

        $form->addText('city', 'Město:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Přijmení musí obsahovat nejméne 2 znaky', '2')
            ->setValue($data->city);

        $form->addSelect('kraj', 'Kraj:', $kraje)
            ->setPrompt('Vyberte kraj')
            ->setAttribute('class', 'form-control')
            ->setRequired('Vyplňtě všechna pole')
            ->setValue($data->kraj);

        $form->addText('email', 'Email:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::EMAIL, 'Neplatný formát emailu')
            ->setValue($data->email);

        $form->addText('phone', 'Telefon:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Telefon musí obsahovat 9 znaků (bez mezer, bez předvolby)', '9')
            ->addRule(Form::MAX_LENGTH, 'Telefon musí obsahovat 9 znaků (bez mezer, bez předvolby)', '9')
            ->setValue($data->phone);

        $form->addText('skype', 'Skype:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control input-block-label')
            ->addRule(Form::MIN_LENGTH, 'Skype musí obsahovat nejméne 2 znaky', '2')
            ->setValue($data->skype);

        $form->addTextArea('ability', 'Moje specializace:')
            ->setRequired('Vyplňte všechna pole')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '5')
            ->setValue($data->ability);

        $form->addSubmit('send', 'Upravit profil')
            ->setAttribute('class', 'btn btn-primary ');

        $form->onSuccess[] = $this->UpdateProfileData;

        return $form;
    }

    public function UpdateProfileData($form)
    {
        $this->log();
        $values = $form->getValues();
        $userId = $this->getUser()->id;

        /*  $test1 = $this->database->table('users')
              ->where("nick", $values->nick)
              ->where('id', $userId)
              ->count("*");

          $test2 = $this->database->table('users')
              ->where("email", $values->email)
              ->count("*");*/

        $this->database->table('users')->where('id', $userId)->update(
            array(
                'nick' => $values->nick,
                'name' => $values->name,
                'surname' => $values->surname,
                'email' => $values->email,
                'phone' => $values->phone,
                'skype' => $values->skype,
                'ability' => $values->ability,
                'city' => $values->city,
                'kraj' => $values->kraj
            )
        );

        $this->flashMessage('Profil akualizován', 'alert-success');
        $this->redirect('profile');
    }

    protected function createComponentUpdateProfilePassForm()
    {
        $userId = $this->getUser()->id;
        $data = $this->database->table('users')->get($userId);

        $form = new Nette\Application\UI\Form;

        $form->addPassword('old_pass', 'Současné heslo:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control ');

        $form->addPassword('new_pass', 'Nové heslo:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control ')
            ->addRule(Form::MIN_LENGTH, 'Heslo musí obsahovat nejméne 5 znaků', '5');

        $form->addPassword('test_pass', 'Kontrola hesla:')
            ->setRequired('Vyplňtě všechna pole')
            ->setAttribute('class', 'form-control ')
            ->addRule(Form::MIN_LENGTH, 'Heslo musí obsahovat nejméne 5 znaků', '5');

        $form->addSubmit('send', 'Změnit heslo')
            ->setAttribute('class', 'btn btn-primary ');

        $form->onSuccess[] = $this->UpdateProfilePassData;

        return $form;
    }

    public function UpdateProfilePassData($form)
    {
        $this->log();
        $values = $form->getValues();
        $userId = $this->getUser()->id;

        $data = $this->database->table('users')->get($userId);
        $old_db = $data->pass;
        $old_form = secure($values->old_pass);

        $new_pas = secure($values->new_pass);
        $test_pass = secure($values->test_pass);

        if ($old_db != $old_form) {
            $this->flashMessage('Zadané heslo nesouhlasí s heslem v databázi', 'alert-danger');
            $this->redirect('profile');
        } elseif ($new_pas != $test_pass) {
            $this->flashMessage('Kontrola hesla je neplatná', 'alert-danger');
            $this->redirect('profile');
        } elseif ($new_pas == $old_db) {
            $this->flashMessage('Nové a staré heslo se nesmí shodovat', 'alert-danger');
            $this->redirect('profile');
        } else {

            $this->database->table('users')->where('id', $userId)->update(
                array(
                    'pass' => $new_pas
                )
            );

            $this->flashMessage('Heslo nastaveno', 'alert-success');
            $this->redirect('profile');
        }

    }

    public function renderUserprofile($id)
    {
        $this->log();
        $this->template->data = $this->database->table('users')->get($id);
    }


    public function ActionDeleteUser($id)
    {
        $this->log();
        if ($this->getUser()->isInRole('admin')) {
            $user = $this->getParameter('id');

            $this->database->table('users')->where('id', $user)->update(
                array(
                    'active' => '0'
                )
            );

            $this->flashMessage('Uživatel smazán', 'alert-success');
            $this->redirect('Users:list');

        } else {
            $this->flashMessage("K této akci nemáte oprávnění", 'alert-warning');
        }
    }
}