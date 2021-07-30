<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DiagramModel extends CI_Model
{

    //get data from database
    public function kantorpusat()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Kantor Pusat');
        $query = $this->db->get();
        return $query->result();
    }
    public function belawan()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Belawan');
        $query = $this->db->get();
        return $query->result();
    }
    public function dumai()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Dumai');
        $query = $this->db->get();
        return $query->result();
    }
    public function tpkbelawan()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'TPK Belawan');
        $query = $this->db->get();
        return $query->result();
    }
    public function tanjungpinang()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Tanjung Pinang');
        $query = $this->db->get();
        return $query->result();
    }
    public function pekanbaru()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Pekan Baru');
        $query = $this->db->get();
        return $query->result();
    }
    public function tanjungbalaikarimun()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Tanjung Balai Karimun');
        $query = $this->db->get();
        return $query->result();
    }
    public function kualatanjung()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Kuala Tanjung');
        $query = $this->db->get();
        return $query->result();
    }
    public function batam()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Batam');
        $query = $this->db->get();
        return $query->result();
    }
    public function seipakning()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Sei Pakning');
        $query = $this->db->get();
        return $query->result();
    }
    public function sibolga()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Sibolga');
        $query = $this->db->get();
        return $query->result();
    }
    public function malahayati()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Malahayati');
        $query = $this->db->get();
        return $query->result();
    }
    public function lhokseumawe()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Lhokseumawe');
        $query = $this->db->get();
        return $query->result();
    }
    public function tanjungbalaiasahan()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Tanjung Balai Asahan');
        $query = $this->db->get();
        return $query->result();
    }
    public function tembilahan()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Tembilahan');
        $query = $this->db->get();
        return $query->result();
    }
    public function gunungsitoli()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Gunung Sitoli');
        $query = $this->db->get();
        return $query->result();
    }
    public function unitgalangankapal()
    {
        $this->db->select('cabang, temuan, nilai_amanah, level, tingkat, avail, util, nilai_kompeten, kaloborasi, nilai_harmonis, revenue, efisiensi, nilai_loyal, koreksi, modul, nilai_adaptif, realisasi_kpi, realisasi_pkm, nilai_kolab, nilai_total, MONTHNAME(created_at)AS created_at');
        $this->db->from('tbl_rapor');
        $this->db->where('cabang', 'Unit Galangan Kapal');
        $query = $this->db->get();
        return $query->result();
    }
}
