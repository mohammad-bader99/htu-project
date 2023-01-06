<?php

namespace Core\Helpers;

use Core\Model\User;


/**
 * helps to redirect the user
 */
class Helper
{

    /**
     * redirect the user
     *
     * @param string $url
     * @return void
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
    }

    
}
