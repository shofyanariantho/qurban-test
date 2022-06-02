<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
	}

	//tampilkan semua data kupon
	public function getKupon()
    {
       	$this->db->order_by('id_kupon');
    	return $this->db->get('data_kupon')->result_array();
	}
	
	//ambil data kupon berdasarkan id kupon
	public function getKuponId($id)
    {
       	$this->db->where('id_kupon',$id);
    	return $this->db->get('data_kupon')->result_array();
	}

	//ambil data kode kupon 
	public  function getKodeKupon()
	{
		return $this->db->get('setting_umum')->result_array();
	}

    public function getUsers($id)
    {
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
	}

    public function deletesemua($table, $data, $pk)
    {
        $this->db->where_in($pk, $data);
        return $this->db->delete($table);
    }
	
	
    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

	//ambil jumlah data
    public function count($table)
    {
        return $this->db->count_all($table);
	}

	//ambil jumlah data berdasarkan kondisi
	public function countkondisi($table,$field, $min)
    {
		$this->db->where($field, $min);
		$query = $this->db->get($table);
		return $query->num_rows();
    }

	//ambil summary jumlah data denngan kondisi
    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

	//ambil jumlah min data denngan kondisi
    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
	}
	
	public function get_max($kode)
    {
		$len = strlen($kode);

	
        $q = $this->db->query("SELECT MAX(RIGHT(kode_kupon,4)) AS kd_max FROM data_kupon WHERE MID(kode_kupon,1,$len)= '".$kode."'");
		$kd = 0;
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1 ;
                $kd =  $tmp;
            }
        } else {
            $kd = 0 ;
        }
        return $kd;
	}
	
	public function import($table, $data, $batch = false)
    {
        if($batch === false){
            $insert = $this->db->insert($table, $data);
        }else{
            $insert = $this->db->insert_batch($table, $data);
        }
        return $insert;
    }

}
