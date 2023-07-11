<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Finalisation_login extends \CI_Controller
{
    public function index()
    {
        $this->load->view('finalisation_login');
    }
}