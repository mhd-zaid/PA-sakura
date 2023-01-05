<?php

Namespace App\Core;


interface Builder{
    public function from(string $table);
    public function delete();
    public function select(string ...$columns);
    public function insert(array $columns);
    public function update(array $columns);
    public function where(string $condition);
    public function andWhere(string $condition);
    public function orWhere(string $condition);
    public function params(array $params);
    public function limit(int ...$limit);
    public function execute();
    public function reset();
    public function __toString();



}