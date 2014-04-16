<?php
use Nette\Security as NS;

class MyAuthenticator extends Nette\Object implements NS\IAuthenticator
{
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    function authenticate(array $credentials)
    {
        list($username, $password) = $credentials;
        $row = $this->database->table('users')
            ->where('nick', $username)->fetch();

        if (!$row) {
            throw new NS\AuthenticationException('User not found.');
        }

        if ($row->pass !== sha1($password . "1dsa354")) {
            throw new NS\AuthenticationException('Invalid password.');
        }

        return new NS\Identity($row->id, $row->role);
    }


}