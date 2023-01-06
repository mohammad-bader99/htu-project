<?php

namespace Core\Base;

/**
 * Include the php html template
 */
class View
{

    
    /**
     * the constructer of the class
     *
     * @param string $view
     * @param array $data
     */
    public function __construct(string $view, array $data = array())
    {
        $view = \str_replace('.', '/', $view);
        $data = (object) $data;

       

        if($view!='login-form')
        {
                include_once \dirname(__DIR__, 2) . "/resources/views/partials/header.php"; // includes the header for all the views

        }

        include_once \dirname(__DIR__, 2) . "/resources/views/$view.php";

        if($view!='login-form')
        {
                include_once \dirname(__DIR__, 2) . "/resources/views/partials/footer.php"; // include the footer for all the views

        }
    }
}
