<?php

namespace MonsterHunterBlog;

/**
 * Controller
 */
abstract class Controller
{
    /**
     * renderView
     *
     * @param  mixed $template
     * @param  mixed $data
     * @return void
     */
    protected function renderView(string $template, array $data = []): void
    {
        View::renderView($template, $data);
    }

    /**
     * redirectToRoute
     *
     * @param  mixed $name
     * @param  mixed $params
     * @return void
     */
    protected function redirectToRoute(string $name, array $params = []): void
    {
        Router::redirectToRoute($name, $params);
    }
}
