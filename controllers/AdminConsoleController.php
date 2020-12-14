<?php
  class AdminConsoleController extends AbstractController
  {
    protected function makeModel() : Model
    {
      return new Model(DB_USER, DB_PASS, DB_NAME, DB_HOST);
    }

    protected function makeView() : View
    {
      $view = new View();
      $view->setTemplate(TEMPLATE_DIR. '/admin/admin_console.tpl.php');
      return $view;
    }

    public function start()
    {
      $this->view = $this->makeView();
      $this->view->go();
    }
  }