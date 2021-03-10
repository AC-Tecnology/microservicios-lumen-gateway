<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;   //para accerder a los metodos response
use App\Models\Book;
//use App\Traits\ApiResponser;    //para acceder a los metodos del trait
use Illuminate\Http\Request;

class BookController extends Controller
{
    //use ApiResponser;       //para acceder a los metodos del trait
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Retrieve and show all the book
     * @return Iluminate\Http\Response
     */

    public function index()
    {
    }

    /**
     * Create a instance of Book
     * @return Iluminate\Http\Response
     */

    public function store(Request $request)
    {
    }

    /**
     * obtain and show an instance of Book
     * @return Iluminate\Http\Response
     */

    public function show($id)
    {
    }

    /**
     * Updated an instance of Book
     * @return Iluminate\Http\Response
     */

    public function update(Request $request, $id)
    {
    }

    /**
     * Remove an instance of a Book
     * @return Iluminate\Http\Response
     */

    public function destroy($id)
    {
    }
}
