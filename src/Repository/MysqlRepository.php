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

    public function update()
    {
    }

    public function exist()
    {
    }

    public function delete()
    {
    }

    public function truncate()
    {
    }
}
