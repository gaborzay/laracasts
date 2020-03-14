<?php

namespace App\Http\Controllers;

//use App\UseCases\PurchasePodcast;
use App\Jobs\PurchasePodcast;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function store()
    {
//        PurchasePodcast::perform();
        dispatch(new PurchasePodcast);

        return 'Done';
    }
}
