<?php


if (!function_exists('pembulatan_rupiah')) {

    /**
     * pembulatan akuntansi nilai rupiah, < 50 menjadi 50, > 50 menjadi 100
     * @param $nominal
     * @return float|int
     */
    function pembulatan_rupiah($nominal)
    {
        $nominal = round($nominal, 0);
        $nominal = (int) $nominal;
        $pecahan = $nominal % 100;

        if ($pecahan < 50 && $pecahan > 0) {
            $pecahan = 50;
        } else if ($pecahan > 50) {
            $pecahan = 100;
        }

        $nominal = (int) $nominal / 100;
        $nominal = (int) $nominal * 100;

        $nominal += $pecahan;

        return $nominal;
    }
}
