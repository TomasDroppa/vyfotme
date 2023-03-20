<?php

class Cenik_model extends CI_model{

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

    function getRow($id){
        $this->db->where('id',$id);
        $row = $this->db->get('cenik')->row_array();
        // SELECT * FROM cenik WHERE id = $id
        return $row;
    }

    function update($id,$formArray) {
        $this->db->where('id',$id);
        $this->db->update('cenik',$formArray);
        return $id;

    }

    function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('cenik');
    }

}

?>
