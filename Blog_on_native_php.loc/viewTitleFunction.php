<?php

function viewTitle()
{
    $titleHome = 'Custom Blog';
    $titleAbout = 'Custom Blog - About';
    $titleSamplePost = 'Custom Blog - Post';
    $titleContact = 'Custom Blog - Contact';
    $titleLogin = 'Custom Blog - Login';

    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            echo $titleHome;
            break;
        case '/login.php':
            echo $titleLogin;
            break;
        case '/index.php':
            echo $titleHome;
            break;
        case '/about.php':
            echo $titleAbout;
            break;
        case '/samplePost.php':
            echo $titleSamplePost;
            break;
        case '/contact.php':
            echo $titleContact;
            break;
        default:
            echo 'Default case';
            break;
    }
}