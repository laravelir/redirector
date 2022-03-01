<?php

namespace Laravelir\Redirector\Repository;

use Laravelir\Redirector\Models\Redirector;

class MysqlRepository  implements RepositoryContract
{
    public function all()
    {
        return Redirector::latest()->get();
    }

    public function find(string $source_url)
    {
        return Redirector::where('source_url', $source_url)->first();
    }

    public function store(string $source_url, string $destination_url, string $response_code = '301')
    {
        if (Redirector::where('source_url', $source_url)->first()) {
            return false;
        }
        return Redirector::create(['source_url' => $source_url, 'destination_url' => $destination_url, 'response_code' => $response_code]);
    }

    public function update(string $source_url, array $data)
    {
        if ($redirect = Redirector::where('source_url', $source_url)->first()) {
            return false;
        }
        return $redirect->update($data);
    }

    public function exist(string $source_url)
    {
        return Redirector::where('source_url', $source_url)->exist();
    }

    public function delete(string $source_url)
    {
        return Redirector::where('source_url', $source_url)->delete();
    }

    public function active(string $source_url): bool
    {
        return Redirector::where(['source_url' => $source_url, 'active' => true])->exist();
    }

    public function findActive(string $source_url)
    {
        return Redirector::where(['source_url' => $source_url, 'active' => true])->first();
    }

    public function truncate()
    {
        return Redirector::get()->delete();
    }
}
