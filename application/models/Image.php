<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Model{
    
    function __construct() {
        $this->table = 'images';
    }
    
    public function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('created', 'desc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        return $result;
    }
    
    public function insert($data = array()) {
        if(!empty($data)){
            // Datum a čas
            if(!array_key_exists("created", $data)){
                $data['created'] = date("d-m-Y H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("d-m-Y H:i:s");
            }
            
            // Vložení do databáze
            $insert = $this->db->insert($this->table, $data);
            
            
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }
    

    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            
            if(!array_key_exists("modified", $data)){
                $data['modified'] = date("d-m-Y H:i:s");
            }
            
            $update = $this->db->update($this->table, $data, array('id' => $id));
            
            return $update?true:false;
        }
        return false;
    }
    
    public function delete($id){
        // Delete member data
        $delete = $this->db->delete($this->table, array('id' => $id));
        
        // Return the status
        return $delete?true:false;
    }
    
}
?>
