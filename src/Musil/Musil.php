<?php

namespace Musil;

use Elastica;
use Monolog\Logger;
use Monolog\Handler\ElasticSearchHandler;
use Monolog\Formatter\ElasticaFormatter;

class Musil
{
    protected $logger;

    public function __construct($channel, array $options)
    {
        $es_handler = $this->load_elastsearch_handler($options['elastic_index'], $options['elastic_type']);

        $this->logger = new Logger($channel);
        $this->logger->pushHandler($es_handler);
    }

    public function logger()
    {
        return $this->logger;
    }

    protected function load_elastsearch_handler($index, $type)
    {
        $index = strtolower($index);
        $type = strtolower($type);

        $es_client = new Elastica\Client;

        $es_handler = new ElasticSearchHandler($es_client, [
            'index' => $index,
            'type' => $type,
        ]);

        $es_handler->setFormatter(new ElasticaFormatter($index, $type));

        return $es_handler;
    }
}