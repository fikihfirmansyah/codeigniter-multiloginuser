<?php
class DiagramModel extends CI_Model
{
    function Jum_data()
    {
        $this->db->group_by('cabang');
        $this->db->select('cabang');
        $this->db->select("count(*) as nilai_total");
        return $this->db->from('tbl_rapor')
            ->get()
            ->result();
    }
}
