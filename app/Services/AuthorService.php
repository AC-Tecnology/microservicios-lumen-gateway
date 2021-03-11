<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService
{
	use ConsumesExternalServices;

	/**
	 * The base uro to be used to consume the authors service
	 * @var string
	 */
	public $baseUri;

	public function __construct()
	{
		$this->baseUri = config('services.authors.base_uri');
	}

	/**
	 * Get the full list of authors from the author service
	 * @return string
	 */
	public function obtainAuthors()
	{
		return $this->performRequest('GET','/authors');
	}


    /**
     * Create an instance of author using the authors service
     * @return string
     */
	public function createAuthor($data)
	{
		return $this->performRequest('POST','/authors', $data);
	}

	/**
	 * Get the single of author from the author service
	 * @return string
	 */
	public function obtainAuthor($id)
	{
		return $this->performRequest('GET',"/authors/{$id}");
	}

	/**
	 * Edit the single of author from the author service
	 * @return string
	 */
	public function editAuthor($data, $id)
	{
		return $this->performRequest('PUT',"/authors/{$id}", $data);
	}

	/**
	 * Delete the single of author from the author service
	 * @return string
	 */
	public function deleteAuthor($id)
	{
		return $this->performRequest('DELETE',"/authors/{$id}");
	}

}