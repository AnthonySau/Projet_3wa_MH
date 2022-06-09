<?php

namespace MonsterHunterBlog;

abstract class View
{
    private const PAGES_PATH = "./views/pages/";
    private const LAYOUT_PATH = "./views/layout.php";

    public static function renderView(string $template, array $data = [])
    {
        $templatePath =  self::PAGES_PATH . $template;
        $data = $data;
        $auth = new Authenticator();
        require self::LAYOUT_PATH;
    }
}