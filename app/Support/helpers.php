<?php

function loggedInUser()
{
    return auth()->user('user');
}