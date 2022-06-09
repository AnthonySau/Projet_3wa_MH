<?php

namespace MonsterHunterBlog;

abstract class Controller
{
    protected function renderView(string $template, array $data = []): void
    {
        View::renderView($template, $data);
    }

    protected function redirectToRoute(string $name, array $params = []): void
    {
        Router::redirectToRoute($name, $params);
    }
}