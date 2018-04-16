<?php

if (! function_exists('musil'))
{
    function musil($channel = 'general')
    {
        $musil = new \Musil\Musil($channel, config('musil'));

        return $musil->logger();
    }
}