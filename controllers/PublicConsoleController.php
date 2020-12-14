<?php
  class PublicConsoleController extends AbstractController
  {
    protected function makeModel() : Model
    {
      return new Model(DB_USER, DB_PASS, DB_NAME, DB_HOST);
    }

    protected function makeView() : View
    {
      $view = new View();
      $view->setTemplate(TEMPLATE_DIR. '/public_console.tpl.php');
      return $view;
    }

    public function start()
    {
      $auth = new AuthenticateController();
      if(!$auth->isUserLoggedIn())
      {
        header("location:index.php");
        exit();
      }
      $vars = [ 'firstName'=> $auth->getUserInfo('firstName'),
                'surname' => $auth->getUserInfo('surname'),
                'name' => $auth->getUserInfo('firstName').' '.$auth->getUserInfo('surname'),
                'licenseNo' => $auth->getUserInfo('licenseNo')];

      $this->view = $this->makeView();
      $this->view->addVars($vars);
      $this->view->go();
    }
  }