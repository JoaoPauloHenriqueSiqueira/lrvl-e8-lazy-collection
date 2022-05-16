<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lazy', function () {

    $collection = \Illuminate\Support\Collection::times(1000000)
        ->map(function ($number) {
            return pow(2, $number);
        })->all();

    $collection = \Illuminate\Support\LazyCollection::times(1000000)
        ->map(function ($number) {
            return pow(2, $number);
        })->all();


    //User::all();
    //User::cursor();

    return "DONE!";

});



Route::get('generator', function () {

    function notHappyFunction($number)
    {
        $return = [];

        for ($i = 1; $i < $number; $i++) {
            $return[] = $i;
        }

        return $return;
    }

    function notHappyFunctionV2($number)
    {
        for ($i = 1; $i < $number; $i++) {
            yield($i);
        }

    }

    foreach (notHappyFunctionV2(100000000) as $number) {
        if ($number % 1000 == 0) {
            dump("HELLO");
        }
    }

//    function happyFunction()
//    {
//        dump(1);
//        yield "One";
//
//        dump(2);
//        yield "TWO";
//        dump(2);
//
//        yield "THREE";
//        dump(3);
//
//
//    }

//    function happyFunction($strings)
//    {
//        foreach ($strings as $string) {
//            dump('start');
//            yield ($string);
//            dump('end');
//        }
//    }

//    $happyFunction = happyFunction();
//
//    dump($happyFunction->current());
//
//    $happyFunction->next();
//
//    dump($happyFunction->current());
//
//    $happyFunction->next();
//
//    dump($happyFunction->current());
//
//    $happyFunction->next();
//
//    dump($happyFunction->current());

//    foreach (happyFunction() as $result) {
//
//        if ($result == "TWO") {
//            return;
//        }
//        dump($result);
//    }

//        foreach (happyFunction(['one','two','three']) as $result) {
    //        if ($result == "two") {
    //            return;
    //        }
    //        dump($result);
//        }
});
