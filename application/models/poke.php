<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Poke extends CI_Model {
	public function pokedata($pokeData)
	{
		$query = 'SELECT * FROM pokes WHERE user_id = ? AND poker_id = ?';
		return $this->db->query($query, array($pokeData['user_id'], $pokeData['poker_id']))->row_array();
	}
	public function NewPoke($pokeData)
	{
		$query = "INSERT INTO pokes (user_id, poke_count, poker_id, created_at, updated_at) VALUES (?, '1', ?, NOW(), NOW())";
		$values = array($pokeData['user_id'], $pokeData['poker_id']);
		$result = $this->db->query( $query, $values );
		return $result;
	}
	public function existingpoke($pokeData)
	{
		$query = 'SELECT * FROM pokes WHERE user_id = ? AND poker_id = ?';
		$user = $this->db->query($query, array($pokeData['user_id'], $pokeData['poker_id']))->row_array();
		$pokes = $user['poke_count'] + 1;
		$query = 'UPDATE pokes SET poke_count = ?, pokes.updated_at = NOW() WHERE user_id = ? AND poker_id =?';
		$values = array($pokes, $pokeData['user_id'], $pokeData['poker_id']);
		return $this->db->query($query, $values);
	}
	public function getAllPokes($id)
	{
		$query = "SELECT pokes.poke_count, users.name FROM pokes LEFT JOIN users ON users.id = pokes.poker_id WHERE pokes.user_id = ?";
		$pokes = $this->db->query( $query, $id)->result_array();
		return $pokes;
	}
	// public function totalpokes() {
	// 	return $this->db->query("SELECT SUM(poke_count) FROM pokes where pokes.user_id = ?", $user['id'])->row_array();
	// }
	// WHY CANT I GET THIS TO WORK WTFFFF
}