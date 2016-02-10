<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Poke');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('user_login');
	}
	public function register()
	{
		$userData = $this->input->post();
		$check_database = $this->User->checkDatabase($userData);
		if($check_database)
		{
			$this->session->set_flashdata('error', 'Please try another email.');
			redirect('/users/index');
		}
		//Validation
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');		
		if($this->form_validation->run())
		{
			$this->User->registerUser($userData);
			$this->session->set_flashdata('success', 'Feel free to sign in!');
			redirect('/users/index');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/users/index');
		}		
	}
	public function login()
	{
		$loginData = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run())
		{
			$user = $this->User->loginUser($loginData);
			if($user)
			{
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('name', $user['name']);
				$this->session->set_userdata('alias', $user['alias']);
				$this->session->set_userdata('email', $user['email']);
				$this->session->set_userdata('id', $user['id']);
				$this->session->set_flashdata("success", "Login successful!");
				redirect('/users/profile');
			}
			else
			{
				$this->session->set_flashdata("login_error", "Invalid email or password.");
				redirect('/users/index');
			}
		}
		else
		{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('/users/index');
		}
	}
	public function profile()
	{
		$id = $this->session->userdata('id');
		$users = $this->User->getAllUsers($id);
		$pokes = $this->Poke->getAllPokes($id);
		// $totals = $this->Poke->totalPokes();
		// $output['totals'] = $totals;
		// output faillll
		$this->load->view('profile_page', array('users' => $users, 'pokes' => $pokes));
	}
	public function pokeUser()
	{
		$pokeData = $this->input->post();
		$exist = $this->Poke->pokedata($pokeData);  
		if($exist){
			$this->Poke->existingpoke($pokeData);
			redirect('/users/profile');

		}
		else
		{
			$this->Poke->NewPoke($pokeData);
			redirect('/users/profile');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/users/index');
	}
}
