<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;   //para accerder a los metodos response
use App\Traits\ApiResponser;    //para acceder a los metodos del trait
use Illuminate\Http\Request;
use App\Services\AuthorService; //para acceder a la conexion con el service de Author

class AuthorController extends Controller
{
    use ApiResponser;       //para acceder a los metodos del trait

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
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Retrieve and show all the authors
     * @return Iluminate\Http\Response
     */
    public function index()
    {
        $responseObtainAuthors = $this->authorService->obtainAuthors();
        return $this->successResponse($responseObtainAuthors);

    }

    /**
     * Create a instance of Author
     * @return Iluminate\Http\Response
     */
    public function store(Request $request)
    {
        $responseCreateAuthors = $this->authorService->createAuthor($request->all());
        return $this->successResponse($responseCreateAuthors, Response::HTTP_CREATED);
    }

    /**
     * obtain and show an instance of author
     * @return Iluminate\Http\Response
     */
    public function show($id)
    {
        $responseObtainAuthor = $this->authorService->obtainAuthor($id);
        return $this->successResponse($responseObtainAuthor);
    }

    /**
     * Updated an instance of author
     * @return Iluminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responseEditAuthor = $this->authorService->editAuthor($request->all(),$id);
        return $this->successResponse($responseEditAuthor);
    }

    /**
     * Remove an instance of a author
     * @return Iluminate\Http\Response
     */

    public function destroy($id)
    {
        $responseDeleteAuthor = $this->authorService->deleteAuthor($id);
        return $this->successResponse($responseDeleteAuthor);
    }

}
