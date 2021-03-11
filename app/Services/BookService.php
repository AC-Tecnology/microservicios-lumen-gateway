<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService
{
	use ConsumesExternalServices;

	/**
	 * The base uro to be used to consume the books service
	 * @var string
	 */
	public $baseUri;

	public function __construct()
	{
		$this->baseUri = config('services.books.base_uri');
	}

	/**
	 * Get the full list of books from the book service
	 * @return string
	 */
	public function obtainBooks()
	{
		return $this->performRequest('GET','/books');
	}

    /**
     * Create an instance of book using the books service
     * @return string
     */
	public function createBook($data)
	{
		return $this->performRequest('POST','/books', $data);
	}

	/**
	 * Get the single of book from the book service
	 * @return string
	 */
	public function obtainBook($id)
	{
		return $this->performRequest('GET',"/books/{$id}");
	}

	/**
	 * Edit the single of book from the book service
	 * @return string
	 */
	public function editBook($data, $id)
	{
		return $this->performRequest('PUT',"/books/{$id}", $data);
	}

	/**
	 * Delete the single of book from the book service
	 * @return string
	 */
	public function deleteBook($id)
	{
		return $this->performRequest('DELETE',"/books/{$id}");
	}
}