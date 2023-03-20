<?php

class Zobraz_cenik_model extends CI_model{

    public function create($formArray){

        $this->db->insert('cenik', $formArray);
        return $id =  $this->db->insert_id();

    }

    // tahle metoda vrátí všechny záznamy z ceník tabulky
    public function all(){
        $result = $this->db
                        ->order_by('id', 'ASC')
                        ->get('cenik')
                        ->result_array();

                        // SELECT * FROM cenik order by id ASC
                        return $result;
    }

  

  

}

?>