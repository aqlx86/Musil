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
        $index = $options['index'];
        $type = $options['type'];

        $es_client = new Elastica\Client;

        $es_handler = new ElasticSearchHandler($es_client, [
            'index' => $index,
            'type' => $type,
        ]);

        $es_handler->setFormatter(new ElasticaFormatter($index, $type));

        $this->logger = new Logger($channel);
        $this->logger->pushHandler($es_handler);
    }

    public function logger()
    {
        return $this->logger;
    }

    public function search($term)
    {
        $es_client = new Elastica\Client;
        $search = new Elastica\Search($es_client);

        $search
            ->addIndex('maxbet')
            ->addType('logs');

        $query = new Elastica\Query($term);

        $search->setQuery($query);

        $hits = $search->search();

        return $hits;

        foreach ($hits as $result)
        {
            dd ($result);

            // $result instanceof Elastica\Result
        }
    }


}