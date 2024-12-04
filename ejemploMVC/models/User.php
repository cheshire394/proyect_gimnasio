<?php
class User
{
    private static $filePath = __DIR__ . '/../data/users.json';

    public static function getAll()
    {
        if (!file_exists(self::$filePath)) {
            return [];
        }
        $data = file_get_contents(self::$filePath);
        return json_decode($data, true) ?? [];
    }

    public static function login($email, $password)
    {
        $users = self::getAll();
        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    public static function register($email, $password)
    {
        $users = self::getAll();
        $users[] = [
            'email' => $email,
            'password' => $password,
        ];
        file_put_contents(self::$filePath, json_encode($users));
    }
}

