<?php

function viewTitle()
{
    $titleHome = 'Custom Blog';
    $titleAbout = 'Custom Blog - About';
    $titleSamplePost = 'Custom Blog - Post';
    $titleContact = 'Custom Blog - Contact';

    switch ($_SERVER['REQUEST_URI']) {
        case '/':
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

function viewTitle2()
{
    $titleHome = 'Custom Blog';
    $titleAbout = 'Custom Blog - About';
    $titleSamplePost = 'Custom Blog - Post';
    $titleContact = 'Custom Blog - Contact';

    if ($_SERVER['REQUEST_URI'] === '/') {
        echo $titleHome;
    } elseif (strpos($_SERVER['REQUEST_URI'], 'about' )) {

    }
}