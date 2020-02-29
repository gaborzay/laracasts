<?php

/**
 * The Adapter Pattern
 */
use Acme\Book;
use Acme\BookInterface;
use Acme\eReaderAdapter;
use Acme\Kindle;
use Acme\Nook;

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person())->read(new Book());
(new Person())->read(new eReaderAdapter(new Kindle()));
(new Person())->read(new eReaderAdapter(new Nook()));
