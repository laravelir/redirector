<?php

namespace Laravelir\Redirector\Repository;

interface RepositoryContract
{
    public function all();
    public function find(string $source_url);
    public function store(string $source_url, string $destination_url, string $response_code = '301');
    public function update();
    public function exist();
    public function delete();
    public function truncate();
}
