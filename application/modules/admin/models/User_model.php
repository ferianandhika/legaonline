<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  private $table = "user";

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }
}
