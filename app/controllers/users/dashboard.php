<?php

class Dashboard extends Controller {
  
  public function __construct(){
    parent::__construct();
    $model= $this->loadUserModel('selectModel');
    $selectCompleted= $model->selectCompletedProjects();
    $selectIncomplete= $model->selectIncompleteProjects();
    $selectPending= $model->selectPendingProjects();
    $this->view->selectCompleted= $selectCompleted;
    $this->view->selectIncomplete= $selectIncomplete;
    $this->view->selectPending= $selectPending;
    $this->view->renderUsers('dashboard/index');
  }
  
}

?>