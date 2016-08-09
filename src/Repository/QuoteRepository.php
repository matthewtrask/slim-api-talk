<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 8/6/16
 * Time: 3:06 PM
 */

namespace Quotes;

use Carbon\Carbon;
use Psr\Log\LoggerInterface;
use PDO;
use Quote;

class QuoteRepository
{
    /**
     * @var PDO 
     */
    protected $pdo;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct($logger, $pdo)
    {
        $this->logger = $logger;
        $this->pdo = $pdo;
    }

    public function getQuotes()
    {
        $this->logger->info('Get all quotes');

        $stmt = $this->pdo->prepare('SELECT id, quote, author, added FROM quote ORDER BY id ASC');
        $stmt->execute();
        $resultSet = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $resultSet[] = new Quote($row['id'], $row['quote'], $row['author'], new Carbon($row['added']));
        }

        return $resultSet;
    }

    public function fetchQuote($id)
    {
        $this->logger->info('Get quote with an id of: ' . $id);

        $stmt = $this->pdo->prepare('SELECT id, quote, author, added FROM quote where id = :id');
        $id = (int) $id;
        $stmt->bindParam(':id', $id);
        $resultSet = [];
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $resultSet[] = new Quote($row['id'], $row['quote'], $row['author'], new Carbon($row['added']));
        }

        return false;
    }

    public function create()
    {

    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }
}