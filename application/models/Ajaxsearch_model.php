<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch_model extends CI_Model {

    public function __construct()
	{

		$this->load->database();
	}

    public function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("songs");

        if($query != '')
        {
            $this->db->like("song", $query);
            $this->db->or_like("artist", $query);
        }

        $this->db->order_by("id", 'DESC');

        return  $this->db->get();
    }
}
