<?php

namespace App\Repositories;

use App\Interfaces\SaleRepositoryInterface;
use App\Models\SalesOrder;

class SaleRepository implements SaleRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function index()
    {
        return SalesOrder::all();
    }

    public function getById($id)
    {
        return SalesOrder::findOrFail($id);
    }

    public function store(array $data)
    {
        return SalesOrder::create($data);
    }

    public function update(array $data, $id)
    {
        return SalesOrder::whereId($id)->update($data);
    }

    public function delete($id)
    {
        SalesOrder::destroy($id);
    }
}
