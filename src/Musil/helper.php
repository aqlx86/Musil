<?php

if (! function_exists('musil'))
{
    function musil($channel = 'general')
    {
        $musil = new \Musil\Musil($channel, [
            'index' => strtolower(config('musil.index')),
            'type' => strtolower(config('musil.type'))
        ]);

        return $musil->logger();
    }
}