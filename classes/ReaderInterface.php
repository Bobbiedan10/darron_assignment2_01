<?php
  interface Reader
  {
    public function find(string $tablename, array $ids) : array;
    public function findAll(string $tablename, array $ids) : array;
  }