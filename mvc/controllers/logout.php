<?php

/**
 * Class logout
 */
class logout extends Controller
{
    /**
     * @return mixed
     */
    function execute()
    {
        unset($_SESSION['fullname']);
        unset($_SESSION['email']);
        unset($_SESSION['id']);
        return $this->redirect('?url=home');
    }
}