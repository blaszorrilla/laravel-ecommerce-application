<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\RolContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class RolRepository extends BaseRepository implements RolContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Rol $model
     */
    public function __construct(Rol $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRol(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findRolById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Rol|mixed
     */
    public function createRol(array $params)
    {
        try {
            $collection = collect($params);

            $rol = new Rol($merge->all());

            $rol->save();

            return $rol;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateRol(array $params)
    {
        $rol = $this->findRolById($params['id']);

        $collection = collect($params)->except('_token');


        $rol->update($merge->all());

        return $rol;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteRol($id)
    {
        $rol = $this->findRolById($id);

        if ($rol->logo != null) {
            $this->deleteOne($rol->logo);
        }

        $rol->delete();

        return $rol;
    }
}
