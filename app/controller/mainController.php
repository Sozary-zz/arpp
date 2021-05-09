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

    public static function updateEvent($request, $context)
    {
        if ($request['id'] && $request['type'] && $request['name'] && $request['max_places'] && $request['date']) {
            switch ($request['type']) {
                case 'formation':
                    $event = new Event(Formation::getById($request['id']));
                    break;
                case 'colloquium':
                    $event = new Event(Colloquium::getById($request['id']));
                    break;
                default:
                    echo json_encode(['status' => 403]);
                    return context::NONE;
            }
            $event->name = $request['name'];
            $event->max_places = $request['max_places'];
            $event->date = $request['date'];

            unset($event->type);
            unset($event->id);

            $event->save();

            echo json_encode(['status' => 200]);

        } else {
            echo json_encode(['status' => 403]);
        }
        return context::NONE;
    }

    public static function editEvent($request, $context)
    {
        if ($context->getSessionAttribute('user')) {
            if ($request['id'] && $request['type']) {
                switch ($request['type']) {
                    case 'formation':
                        $context->payload = Formation::getById($request['id']);
                        break;
                    case 'colloquium':
                        $context->payload = Colloquium::getById($request['id']);
                        break;
                    default:
                        $context->redirect('?action=admin');
                        break;
                }
                if (!$context->payload) {
                    $context->redirect('?action=admin');
                }
                $context->payload = json_encode($context->payload);
            } else {
                $context->redirect('?action=admin');
            }
            return context::SUCCESS;
        }
        $context->redirect('?action=login');
    }

    public static function getCurrentUser($request, $context)
    {
        echo json_encode(["status" => 200, "user" => $context->getSessionAttribute('user') ?? null]);
        return context::NONE;
    }

    public static function getFormations($request, $context)
    {
        echo json_encode(["status" => 200, "formations" => Formation::getFormations()]);
        return context::NONE;
    }

    public static function getColloquia($request, $context)
    {
        echo json_encode(["status" => 200, "colloquia" => Colloquium::getColloquia()]);
        return context::NONE;
    }

    public static function disconnect($request, $context)
    {
        $context->setSessionAttribute('user', null);
        echo json_encode(["status" => 200]);
        return context::NONE;
    }

    public static function admin($request, $context)
    {
        if ($context->getSessionAttribute('user')) {
            return context::SUCCESS;
        }
        $context->redirect('?action=login');
    }

    public static function login($request, $context)
    {
        return context::SUCCESS;
    }

    public static function connect($request, $context)
    {
        $user = User::get($request['login'], $request['password']);
        $context->setSessionAttribute('user', $user);
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
