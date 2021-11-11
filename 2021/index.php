<?php
# Redirect to New Year's Event Eventbrite
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

Redirect('https://www.eventbrite.com/e/87385104199', false);
