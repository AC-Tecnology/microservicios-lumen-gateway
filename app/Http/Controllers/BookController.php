<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;   //para accerder a los metodos response
use App\Traits\ApiResponser;    //para acceder a los metodos del trait
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Services\AuthorService;

class BookController extends Controller
{
    use ApiResponser;       //para acceder a los metodos del trait

    /**
     * The service to consume the book service
     * @var BookService
     */
    public $bookService;

    /**
     * The service to consume the author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
    }


    /**
     * Retrieve and show all the books
     * @return Iluminate\Http\Response
     */
    public function index()
    {
        $responseObtainBooks = $this->bookService->obtainBooks();
        return $this->successResponse($responseObtainBooks);

    }

    /**
     * Create a instance of Book
     * @return Iluminate\Http\Response
     */
    public function store(Request $request)
    {
        $responseCreateBooks = $this->bookService->createBook($request->all());
        return $this->successResponse($responseCreateBooks, Response::HTTP_CREATED);
    }

    /**
     * obtain and show an instance of book
     * @return Iluminate\Http\Response
     */
    public function show($id)
    {
        $responseObtainBook = $this->bookService->obtainBook($id);
        return $this->successResponse($responseObtainBook);
    }

    /**
     * Updated an instance of book
     * @return Iluminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responseEditBook = $this->bookService->editBook($request->all(),$id);
        return $this->successResponse($responseEditBook);
    }

    /**
     * Remove an instance of a book
     * @return Iluminate\Http\Response
     */

    public function destroy($id)
    {
        $responseDeleteBook = $this->bookService->deleteBook($id);
        return $this->successResponse($responseDeleteBook);
    }

}
