<?php


/**
 * Strategy Pattern
 */
interface Logger
{
    public function log($data);
}

// Define a family of algorithms
class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a database');
    }
}

class LogToXWebService implements Logger
{
    public function log($data)
    {
        var_dump('Log the data to a web service');
    }
}

class App
{
    public function log($data, Logger $logger = null)
    {
        $logger = $logger ?: new LogToFile;
        $logger->log($data);
    }
}

$app = new App;

$app->log('Some information here');
$app->log('Some information here', new LogToFile);
$app->log('Some information here', new LogToDatabase);
$app->log('Some information here', new LogToXWebService);