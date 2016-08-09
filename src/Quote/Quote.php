<?php

/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 8/7/16
 * Time: 2:25 PM
 */
class Quote
{
    /**
     * @var Int
     */
    private $id;

    /**
     * @var string
     */
    private $quote;

    /**
     * @var string
     */
    private $author;

    /**
     * @var Carbon\Carbon
     */
    private $added;

    /**
     * Quote constructor.
     * @param $id
     * @param $quote
     * @param $author
     * @param $added
     */
    public function __construct($id, $quote, $author, $added)
    {
        $this->id = $id;
        $this->quote = $quote;
        $this->author = $author;
        $this->added = $added;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getQuote()
    {
        return $this->quote;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getAdded()
    {
        return $this->added;
    }

    public function serialize()
    {
        return [
            'id' => $this->id,
            'quote' => $this->quote,
            'author' => $this->author,
            'date_added' => $this->added
        ];
    }
}