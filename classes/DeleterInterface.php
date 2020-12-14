<?php
  interface Deleter
  {
    public function del(array $tablenames, array $ids);
  }