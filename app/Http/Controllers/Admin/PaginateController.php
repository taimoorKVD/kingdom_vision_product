<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PaginationRepository;

class PaginateController extends Controller
{
    private $paginationRepository;
    public function __construct(PaginationRepository $paginationRepository)
    {
        $this->paginationRepository = $paginationRepository;
    }

    public function set_pagination() {
        return $this->paginationRepository->set_pagination(request()->all());
    }
}
