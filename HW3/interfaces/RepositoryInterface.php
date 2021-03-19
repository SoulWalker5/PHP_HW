<?php


namespace interfaces;


use models\Entity;

interface RepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create($model);

    public function delete($id);

    public function update($model);
}