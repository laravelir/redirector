<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Http\Request;
use Laravelir\Redirector\Repository\XMLRepository;
use Laravelir\Redirector\Repository\MysqlRepository;
use Laravelir\Redirector\Repository\RedisRepository;
use Laravelir\Redirector\Repository\MongodbRepository;

class Redirector
{
    private $repository;

    private $repositories = [
        'mysql' => MysqlRepository::class,
        'redis' => RedisRepository::class,
        'xml'  => XMLRepository::class,
        'mongodb' => MongodbRepository::class,
    ];

    public function __construct()
    {
        $this->repository = $this->setRepository();
    }

    public function setRepository()
    {
        $repository = config('redirector.repository') ?? 'mysql';

        return array_key_exists($repository, $this->repositories) ?
            resolve($this->repositories[$repository]) : resolve($this->repositories['mysql']);
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function shouldRedirect(Request $request)
    {
        if (!$request->isMethod('get') || $request->expectsJson()) {
            return false;
        }
        $redirect = $this->find($request->path());
        if (!$redirect) {
            return false;
        }
        return true;
    }

    public function redirect(Request $request)
    {
        $redirect = $this->find($request->path());
        return redirect($redirect->destination_url, $redirect->response_code);
    }

    public function responseCode($code = null)
    {
        $code = $code;
        if ($code == null) {
            $code = config('redirector.default_response_code');
        }
        $valid = [301, 302, 303, 304, 307, 308, 410, 451];
        if (!in_array($code, $valid)) {
            $code = 301;
        }
        return $code;
    }

    public function redirects()
    {
        return $this->model->latest()->get();
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function find(string $source_url)
    {
        return $this->repository->find($source_url);
    }

    public function store(string $source_url, string $destination_url, string $response_code = '301')
    {
        return $this->repository->store($source_url, $destination_url, $response_code);
    }

    public function update()
    {
    }

    public function exist(string $source_url)
    {
        return $this->repository->exist($source_url);
    }

    public function delete(string $source_url)
    {
        return $this->repository->delete($source_url);
    }

    public function truncate()
    {
        return $this->repository->truncate();
    }
}
