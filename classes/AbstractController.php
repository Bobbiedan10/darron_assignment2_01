<?php
  abstract class AbstractController
  {
    protected $model = null;
    protected $view = null;

    abstract protected function makeModel() : Model;
    abstract protected function makeView() : View;
    abstract public function start();
  }