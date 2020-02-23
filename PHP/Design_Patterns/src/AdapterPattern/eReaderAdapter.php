<?php


namespace Acme;


class eReaderAdapter implements BookInterface
{

    private $eReader;

    public function __construct(eReaderInterface $eReader)
    {
        $this->eReader = $eReader;
    }

    public function open()
    {
        return $this->eReader->turnOn();
    }

    public function turnPage()
    {
        return $this->eReader->pressNextButton();
    }
}