<?php

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