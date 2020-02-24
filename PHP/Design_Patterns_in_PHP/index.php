<?php

require 'vendor/autoload.php';

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

/**
 * Template Method Pattern
 */

use App\TurkeySub;
use App\VeggieSub;

(new TurkeySub())->make();
(new VeggieSub())->make();

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

/**
 * Chain of Responsibility Pattern
 */
abstract class HomeChecker
{
    public $successor;

    public abstract function check(HomeStatus $home);

    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor) {
            $this->successor->check($home);
        }
    }
}

class Locks extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->locked) {
            throw new Exception('The doors are not locked!! Abort abort.');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->lightsOff) {
            throw new Exception('The doors are on!! Abort abort.');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker
{
    public function check(HomeStatus $home)
    {
        if (!$home->alarmOn) {
            throw new Exception('The alarm has not been set!! Abort abort.');
        }

        $this->next($home);
    }
}

class HomeStatus
{
    public $alarmOn = true;
    public $locked = true;
    public $lightsOff = true;
}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

$locks->succeedWith($lights);
$lights->succeedWith($alarm);
$locks->check(new HomeStatus);

/**
 * The Specification Pattern
 */
class Customer
{
    public $plan;

    public function __construct($plan)
    {
        $this->plan = $plan;
    }
}

class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->plan == 'gold';
    }
}

class CustomerRepository
{
    protected $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    public function all()
    {
        return $this->customers;
    }

    public function matchingSpecification($specification)
    {
        return array_map(function ($customer) use ($specification) {
            if ($specification->isSatisfiedBy($customer)) {
                return $customer;
            }
        }, $this->all());
    }
}

$spec = new CustomerIsGold;
$spec->isSatisfiedBy(new Customer('gold'));

$customers = new CustomerRepository([
    new Customer('gold'),
    new Customer('bronze'),
    new Customer('silver'),
    new Customer('gold'),
]);

$matches = $customers->matchingSpecification($spec);
var_dump($matches);