<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model {
	public function checkDatabase($userData)
	{
		$query = 'SELECT * FROM users WHERE email = ?';
		return $this->db->query($query, $userData['email'])->row_array();
	}
	public function registerUser($userData)
	{
		$query = "INSERT INTO users (name, alias, email, password, date_of_birth, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($userData['name'], $userData['alias'], $userData['email'], $userData['password'], $userData['date_of_birth']);
		return $this->db->query( $query, $values );
	}
	public function loginUser($loginData)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($loginData['email'], $loginData['password']);
		$user = $this->db->query( $query, $values )->row_array();
		return $user;
	}
	public function getAllUsers($id)
	{
		$query = "SELECT * FROM users WHERE users.id NOT LIKE ?";
		$users = $this->db->query( $query, array($id) )->result_array();
		return $users;
	}
}