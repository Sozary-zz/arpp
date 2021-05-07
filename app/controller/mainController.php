<?php
/*
 * Controler
 */
// require($nameApp . '/model/user.php');

class mainController
{
    public static function home($request, $context)
    {
        return context::SUCCESS;
    }

    public static function getCurrentUser($request, $context)
    {
        echo json_encode(["status" => 200, "user" => $_SESSION['user'] ?? null]);
        return context::NONE;
    }

    public static function disconnect($request, $context)
    {
        $_SESSION['user'] = null;
        echo json_encode(["status" => 200]);
        return context::NONE;
    }

    public static function admin($request, $context)
    {
        if ($context->user) {
            return context::SUCCESS;
        }
        return context::ERROR;
    }

    public static function login($request, $context)
    {
        return context::SUCCESS;
    }

    public static function connect($request, $context)
    {
        $user = User::get($request['login'], $request['password']);
        $_SESSION['user'] = $user;
        echo json_encode(["status" => 200, "user" => $user]);

        return context::NONE;
    }

    public static function sendMessage($request, $context)
    {
        // https://grafikart.fr/blog/mail-local-wamp
        mail('mehdiayache@hotmail.fr', 'sujet', $request['content']);
        echo json_encode(["status" => 200]);
        return context::NONE;
    }

    public static function getUsers($request, $context)
    {
        // Petit exemple de comment utiliser enregistrer/récupérer des données
        $user = new User();
        $user->login = "elsa";
        $user->password = "1234";
        $user->age = "22";
        $user->save();

        echo json_encode(["status" => 200, "users" => User::getUsers()]);
        return context::NONE;
    }
    public static function getMovie($request, $context)
    {
        global $nameApp;
        if (isset($request['title'])) {
            $c = json_decode(file_get_contents($nameApp . '/model/data.json'));

            foreach ($c as $v) {
                if ($v->title == $request['title']) {
                    echo json_encode($v);
                    return context::NONE;
                }
            }

        }
        echo "0x0";
        return context::NONE;
    }
//Cherche fichier about success
    public static function about($request, $context)
    {
        return context::SUCCESS;
    }
}
