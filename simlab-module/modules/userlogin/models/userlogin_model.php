<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class userlogin_model extends CI_Model {

		public function cek_user($data) {
			$query = $this->db->get_where('tb_petugas', $data);
			return $query;
		}

	}

?>