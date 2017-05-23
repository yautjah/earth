<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $this->layout->add_css('globalize');

		$this->layout->prepare_view('login/welcome');
		$this->layout->show_view();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
