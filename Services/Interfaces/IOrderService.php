<?php


namespace App\Services\Interfaces;


interface IOrderService
{
    public function create();
    public function all();
    public function store(array $attribute);
    public function update (array $attribute,$id);
}
