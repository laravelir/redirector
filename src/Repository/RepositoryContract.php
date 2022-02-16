<?php

namespace Laravelir\Redirector\Repository;

interface RepositoryContract
{
    public function all();
    public function find(string $source_url);
    public function store(string $source_url, string $destination_url, string $response_code = '301');
    public function update();
    public function exist(string $source_url);
    public function delete(string $source_url);
    public function truncate();
}
