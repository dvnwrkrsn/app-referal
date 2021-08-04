<?php

class Spp_model extends CI_Model
{

    public function data_siswa()
    {
        $sql = "SELECT
                    t_siswa.id_siswa AS id,
                    t_kelas.nama_kelas AS kelas,
                    t_kelas.tahun_ajaran AS tahun,
                    t_kelas.id_kelas AS id_kelas,
                    t_siswa.nama_siswa AS siswa,
                    t_siswa.nis AS nis,
                    t_siswa.jenis_kelamin,
                    t_siswa.alamat
                FROM
                    t_siswa
                JOIN t_kelas ON t_kelas.id_kelas = t_siswa.id_kelas
                ORDER BY t_siswa.id_siswa ASC";

        return $this->db->query($sql);
    }

    public function get_data_siswa($id)
    {
        $sql = "SELECT
                    t_siswa.id_siswa AS id,
                    t_kelas.nama_kelas AS kelas,
                    t_kelas.tahun_ajaran AS tahun,
                    t_siswa.nama_siswa AS siswa,
                    t_siswa.nis AS nis,
                    t_siswa.jenis_kelamin,
                    t_siswa.alamat 
                FROM
                    t_siswa
                    JOIN t_kelas ON t_kelas.id_kelas = t_siswa.id_kelas
                    WHERE t_siswa.id_siswa = ?";
        return $this->db->query($sql, array($id));
    }

    public function delete_data_siswa($params = array())
    {
        $sql = "DELETE FROM t_siswa WHERE id_siswa = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function data_kelas()
    {
        $sql = "SELECT * FROM t_kelas";

        return $this->db->query($sql);
    }

    public function delete_data_kelas($params = array())
    {
        $sql = "DELETE FROM t_kelas WHERE id_kelas = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function data_jenis_pembayaran()
    {
        $sql = "SELECT
                    t_jenis_bayar.id_jenis AS id,
                    t_jenis_bayar.id_kelas AS id_kelas,
                    t_kelas.nama_kelas AS kelas,
                    t_kelas.tahun_ajaran AS tahun,
                    t_jenis_bayar.jumlah AS jumlah
                FROM
                    t_jenis_bayar
                JOIN t_kelas ON t_kelas.id_kelas = t_jenis_bayar.id_kelas";

        return $this->db->query($sql);
    }

    public function delete_data_pembayaran($params = array())
    {
        $sql = "DELETE FROM t_jenis_bayar WHERE id_jenis = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function data_pembayaran($id)
    {
        $sql = "SELECT
                    t_siswa.id_siswa AS id,
                    t_siswa.nis AS nis,
                    t_siswa.nama_siswa AS siswa,
                    t_siswa.jenis_kelamin AS jk,
                    t_kelas.nama_kelas AS kelas,
                    t_kelas.tahun_ajaran AS tahun,
                    t_jenis_bayar.jumlah AS jumlah
                FROM
                    t_siswa
                JOIN t_kelas ON t_kelas.id_kelas = t_siswa.id_kelas
                JOIN t_jenis_bayar ON t_jenis_bayar.id_kelas = t_kelas.id_kelas
                WHERE t_siswa.id_siswa = ?
                GROUP BY t_siswa.nis";
        return $this->db->query($sql, array($id));
    }

    public function get_data_pembayaran($id_siswa)
    {
        $sql = "SELECT
                    * 
                FROM
                    t_pembayaran 
                WHERE
                    id_siswa = ?";
        return $this->db->query($sql, array($id_siswa));
    }

    public function get_data_pembayaran_by_no($id)
    {
        $sql = "SELECT
                    *
                FROM 
                    t_pembayaran
                WHERE id_pembayaran = ?";
        return $this->db->query($sql, array($id));
    }

    public function get_all_data_pembayaran_by_no($nis)
    {
        $sql = "SELECT
                    *
                FROM 
                    t_pembayaran
                WHERE nis = ?";
        return $this->db->query($sql, array($nis));
    }

    public function delete_data_transaksi($params = array())
    {
        $sql = "DELETE FROM t_pembayaran WHERE id_pembayaran = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function get_data_akun()
    {
        $sql = "SELECT
                    *
                FROM 
                    t_akun";
        return $this->db->query($sql);
    }

    public function get_data_kas()
    {
        $sql = "SELECT
                    *
                FROM 
                    t_akun
                WHERE kode_akun = 'A-1110'";
        return $this->db->query($sql);
    }

    public function get_data_pendapatan()
    {
        $sql = "SELECT
                    *
                FROM 
                    t_akun
                WHERE kode_akun = 'B-1200'";
        return $this->db->query($sql);
    }

    public function delete_data_akun($params = array())
    {
        $sql = "DELETE FROM t_akun WHERE id_akun = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function get_last_no_pembayaran($month, $year)
    {
        $sql = "SELECT no_pembayaran FROM t_pembayaran 
                WHERE MONTH(tgl_bayar) = ? 
                AND YEAR(tgl_bayar) = ?
                ORDER BY no_pembayaran DESC 
                LIMIT 1";
        return $this->db->query($sql, array($month, $year));
    }

    public function get_last_no_referensi($month, $year)
    {
        $sql = "SELECT no_referensi FROM t_detail_jurnal 
                WHERE MONTH(tanggal) = ? 
                AND YEAR(tanggal) = ?
                ORDER BY no_referensi DESC 
                LIMIT 1";
        return $this->db->query($sql, array($month, $year));
    }

    public function get_data_pembayaran_by_date_range($start, $end)
    {
        $sql = "SELECT
                    t_pembayaran.no_pembayaran,
                    t_pembayaran.tgl_bayar,
                    t_pembayaran.nis,
                    t_siswa.nama_siswa,
                    t_pembayaran.jumlah 
                FROM
                    t_pembayaran
                    JOIN t_siswa ON t_siswa.nis = t_pembayaran.nis 
                WHERE t_pembayaran.tgl_bayar BETWEEN ? AND ?
                ORDER BY t_pembayaran.tgl_bayar ASC";
        return $this->db->query($sql, array($start, $end));
    }

    public function get_data_pembayaran_by_bulan($bulan)
    {
        $sql = "SELECT
                    t_pembayaran.no_pembayaran,
                    t_pembayaran.tgl_bayar,
                    t_pembayaran.nis,
                    t_siswa.nama_siswa,
                    t_pembayaran.jumlah 
                FROM
                    t_pembayaran
                    JOIN t_siswa ON t_siswa.nis = t_pembayaran.nis 
                WHERE
                    t_pembayaran.bulan = ?
                ORDER BY
                    t_pembayaran.bulan ASC";
        return $this->db->query($sql, array($bulan));
    }

    public function get_jurnal()
    {
        $sql = "SELECT
                    t_detail_jurnal.debet,
                    t_detail_jurnal.kredit,
                    t_detail_jurnal.kode_akun,
                    t_detail_jurnal.bulan,
                    t_detail_jurnal.no_referensi,
                    t_akun.nama_akun,
                    t_detail_jurnal.id 
                FROM
                    t_detail_jurnal
                JOIN t_akun ON t_akun.kode_akun = t_detail_jurnal.kode_akun";
        return $this->db->query($sql);
    }

    public function delete_data_jurnal($params = array())
    {
        $sql = "DELETE FROM t_detail_jurnal WHERE no_referensi = ?";
        return $this->db->query($sql, array($params['id']));
    }

    public function edit($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
