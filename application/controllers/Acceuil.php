<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acceuil extends \CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('acceuil');
        $this->load->view('footer');
    }
}