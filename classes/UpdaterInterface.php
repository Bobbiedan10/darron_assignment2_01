<?php
  interface Updater
  {
    public function update(array $tables, array $fields);
  }