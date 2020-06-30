<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rental_model extends CI_Model
{


    public function addrental($rental)
    {
        $this->db->insert("rentals", $rental);
    }

    public function getrentals()
    {
        $response = $this->db->query("SELECT * FROM rentals")->results();
        return $response;
    }

    public function updaterental($rental)
    {
        $name = $rental->name;
        $lastname = $rental->lastname;
        $id = $rental->id;
        $response = $this->db->query("UPDATE rentals SET name='{$name}',lastname='{$lastname}'WHERE id='{$id}'");
        return $response;
    }

    public function deleterental($id)
    {
        $response = $this->db->query("DELETE FROM rentals WHERE id = {$id->id}");
        return $response;
    }
}
