<?php

//we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

		public function __construct() {
				parent::__construct();

				// Load form helper library
				$this->load->helper('form');

				//Load URL Helper
				$this->load->helper('url_helper');

				// Load form validation library
				$this->load->library('form_validation');

				// Load session library
				$this->load->library('session');

				// Load database
				$this->load->model('login_database');
		}

		// Show login page
		public function index() {
				$this->load->view('login_form');
		}

		// Show registration page
		public function user_registration_show() {
				$this->load->view('registration_form');
		}

		// Validate and store registration data in database
		public function new_user_registration() {

				// Check validation for user input in SignUp form
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('email_value', 'Email', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
						$this->load->view('registration_form');
				} else {
						$data = array(
						'name' => $this->input->post('username'),
						'email' => $this->input->post('email_value'),
						'password' => $this->input->post('password')
						);
						$result = $this->login_database->registration_insert($data);
						if ($result == TRUE) {
								$data['message_display'] = 'Registration Successfully !';
								$this->load->view('login_form', $data);
						} else {
								$data['message_display'] = 'Username already exist!';
								$this->load->view('registration_form', $data);
						}
				}
		}

		// Check for user login process
		public function user_login_process() {

			// session_start(); 

				$this->form_validation->set_rules('username', 'Username', 'trim|required',
																														array('required' => 'The Email field is required'));
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
						if(isset($this->session->userdata['logged_in'])){
								$this->load->view('admin_page');
								// redirect('/News/index');
						}else{
								$this->load->view('login_form');
						}
				} else {
								$data = array(
								'username' => $this->input->post('username'),
								'password' => $this->input->post('password')
								);
								$result = $this->login_database->login($data);
						if ($result == TRUE) {
								// echo $result;
								// die();
										$username = $this->input->post('username');
										// print_r($username);
										// print_r($this->input->post('username'));
										// die();
										$result = $this->login_database->read_user_information($username);
								if ($result != false) {
										$session_data = array(
										'username' => $result[0]->name,
										'email' => $result[0]->email,
										'id' => $result[0]->id,
										);
										// Add user data in session
										$this->session->set_userdata('logged_in', $session_data);
										$this->load->view('admin_page');
										// redirect('/News/index');
								}
						} else {
									$data = array(
									'error_message' => 'Invalid Username or Password'
									);
									$this->load->view('login_form', $data);
						}
				}
		}

		// Logout from admin page
		public function logout() {
				// Removing session data
				$sess_array = array(
						'username' => '',
						'email' => '',
						'id' => '',
				);
				$this->session->unset_userdata('logged_in', $sess_array);
				$data['message_display'] = 'Successfully Logout';
				// $this->load->view('login_form', $data);
                redirect('/');
		}

}
?>