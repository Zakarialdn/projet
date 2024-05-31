<?php

class Router
{
    private $request;

    private $routes = [
        'home' => ['controllers' => 'HomeController', 'method' => 'showHome'],
        'register' => ['controllers' => 'RegisterController', 'method' => 'showRegister'],
        'login' => ['controllers' => 'LoginController', 'method' => 'showLogin'],
        'profile' => ['controllers' => 'ProfileController', 'method' => 'showProfile'],
        'updateProfile' => ['controllers' => 'ProfileController', 'method' => 'updateProfile'],
        'confirm' => ['controllers' => 'ProfileController', 'method' => 'showConfirm'],
        // 'deleteProfile' => ['controllers' => 'ProfileController', 'method' => 'deleteProfile'],
        'logout' => ['controllers' => 'LogoutController', 'method' => 'getLogout'],
        'article' => ['controllers' => 'ArticleController', 'method' => 'showArticle'],
        'category' => ['controllers' => 'CategoryController', 'method' => 'showCategory'],
        'comment' => ['controllers' => 'CommentController', 'method' => 'showComment'],
        'add_article' => ['controllers' => 'ArticleController', 'method' => 'createArticle'],
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function renderControllers()
    {
        $request = $this->request;

        if (key_exists($request, $this->routes)) {
            $controllers = $this->routes[$request]['controllers'];
            $method = $this->routes[$request]['method'];

            // include(CONTROLLERS.$controllers.'php');

            $currentController = new $controllers();
            $currentController->$method();
        } else {
            echo 'Erreur 404 - Page introuvable';
        }
    }
}
