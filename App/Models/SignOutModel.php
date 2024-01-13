<?php

class SignOutModel
{
    public function signOut()
    {
        session_unset();
        return 'Location: /';
    }
}
