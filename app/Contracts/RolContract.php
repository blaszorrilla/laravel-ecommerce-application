<?php

namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface RolContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRol(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function finRolById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createRol(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRol(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteRol($id);
}
