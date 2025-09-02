<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('tanggal_indo')) {
    /**
     * Format tanggal ke bahasa Indonesia
     * 
     * @param string $tanggal format Y-m-d (contoh: 2025-08-25)
     * @param bool $cetak_hari true kalau mau tampilkan hari (Senin, Selasa, ...)
     * @return string
     */
    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 => 'Senin',
                 'Selasa',
                 'Rabu',
                 'Kamis',
                 'Jumat',
                 'Sabtu',
                 'Minggu'
        );

        $bulan = array(
            1 => 'Januari',
                 'Februari',
                 'Maret',
                 'April',
                 'Mei',
                 'Juni',
                 'Juli',
                 'Agustus',
                 'September',
                 'Oktober',
                 'November',
                 'Desember'
        );

        $bulan2 = array(
            1 => 'Jan',
                 'Feb',
                 'Mar',
                 'Apr',
                 'Mei',
                 'Jun',
                 'Jul',
                 'Agu',
                 'Sep',
                 'Okt',
                 'Nov',
                 'Des'
        );

        $split = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan2[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }
}
