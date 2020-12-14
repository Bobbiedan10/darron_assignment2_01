<?php
  class RegistrationController extends AbstractController
  {
    protected $errors = [];
    protected function makeModel() : Model
    {
      return new Model(DB_USER, DB_PASS, DB_NAME, DB_HOST);
    }

    protected function makeView() : View
    {
      $view = new View();
      $view->setTemplate(TEMPLATE_DIR. '/registration.tpl.php');
      return $view;
    }

    public function start()
    {
      $this->view = $this->makeView();
      $this->view->addVar('errors', $this->errors);
      $this->view->go();
      
      if(isset($_POST['register']))
      {
        $this->register($_POST);
      }
    }

    public function setErrorMessages(array $errors)
    {
      if(!empty($errors))
      {
        $this->errors = $errors;
      }
    }

    private function register(array $data)
    {
      if(empty($data))
      {
        trigger_error('Empty parameter passed to register()', E_USER_ERROR);
      }

      $vars = [];

      $validate = new ValidateController();
      $validate->checkId($data['national_id']);
      $validate->checkLicenseNo($data['licenseNo']);
      $validate->checkName($data['firstName']);
      $validate->checkName($data['surname']);
      $validate->checkEmail($data['email']);
      $validate->checkTelNum($data['prefix'], $data['line_number']);
      $validate->checkAddr($data['address1']);
      $validate->checkAddr($data['address2']);
      $validate->loadParishes();
      $errors = $validate->getErrorMessages();

      if(!empty($errors))
      {
        $info['national_id'] = $data['national_id'];
        $info['licenseNo'] = $data['licenseNo'];
        $info['firstName'] = $data['firstName'];
        $info['surname'] = $data['surname'];
        $info['email'] = $data['email'];
        $info['telephone'] = $data['prefix'].$data['line_number'];
        $info['address1'] = $data['address1'];
        $info['address2'] = $data['address2'];
        $info['parish'] = $data['parish'];

        $vars = [
          'info' => $info,
          'errors' => $errors,
        ];

        $this->view->addVars($vars);
        $this->view->go();
      }
      else
      {
        $this->model->add('vlrms_drivers',$info);
        header('location:index.php');
      }
    }
  }