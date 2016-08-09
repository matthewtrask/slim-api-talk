<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 8/6/16
 * Time: 2:32 PM
 */

namespace Quotes;

use Interop\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

use Carbon\Carbon;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class QuoteController
{
    /**
     * @var ContainerInterface
     */
    protected $ci;

    /**
     * @var QuoteRepository
     */
    protected $repository;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct($ci, $logger)
    {
        $this->ci = $ci;
        $this->logger = $logger;
    }

    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info('Getting quotes');

        $fractal = new Manager();

        $quotes = $this->repository->getQuotes();

        $resource = new Collection($quotes, function(array $quote){
            return [
                'id' => (int) $quote['id'],
                'quote' => (string) $quote['quote'],
                'author' => (string) $quote['author'],
                'added' => $quote['added'],
                'links' => [
                    [
                        'rel' => 'self',
                        'uri' => '/quote'
                    ]
                ]
            ];
        });

        $response = $fractal->createData($resource)->toArray();

        return $response;
    }

    public function fetch(Request $request, Response $response, $args)
    {
        
    }

    public function create(Request $request, Response $response, $args)
    {

    }

    public function edit(Request $request, Response $response, $args)
    {

    }

    public function delete(Request $request, Response $response, $args)
    {

    }
}