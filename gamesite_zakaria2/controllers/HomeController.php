<?php

// OK 👍


class HomeController
{
    private $template;

    public function showHome()
    {
        // On inclut le template
        $this->template = "home";

        // Également le layout qui gère le header et le footer
        include('views/layout.phtml');
    }
}
