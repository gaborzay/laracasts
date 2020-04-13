<?php

//function compress($files, $fileType, $destination, $compressor)
//{
//    if ($fileType == 'css') {
//        // Compress CSS
//    }
//
//    if ($fileType == 'javascript') {
//        if ($compressor) {
//            $compressor($files );
//        }
//    }
//}

function compress(CompressionStrategy $strategy)
{
    $strategy->fire();
}

interface CompressionStrategy
{
    public function fire();
}

class JavaScriptDriver implements CompressionStrategy
{
    private $files;
    private $destination;

    public function __construct($files, $destination)
    {
        $this->files = $files;
        $this->destination = $destination;
    }

    public function fire()
    {

    }
}

compress(
    new JavaScriptDriver($files, $destination)
);
