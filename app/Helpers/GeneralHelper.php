<?php

if (!function_exists('tanggalSort')) {
    function tanggalSort($date)
    {
        // Set locale to Bahasa Indonesia
        \Carbon\Carbon::setLocale('id');
        // format keluaran Sel, 9 Jan 23
        return \Carbon\Carbon::parse($date)->isoFormat('ddd, D MMM YY');
    }
}

if (!function_exists('getDbException')) {
    function getDbException($errorInfo)
    {
        if ($errorInfo[1] === 1062) {
            $errorMessage = $errorInfo[2];

            $errorKey = str_replace("Duplicate entry '", "", $errorMessage); // Menghapus awalan
            $errorKey = str_replace("' for key '", "|", $errorKey); // Menghapus tengah
            $errorKey = str_replace("'", "", $errorKey); // Menghapus akhiran
            $explodeKey = explode('|', $errorKey);

            $value = $explodeKey[0];

            $errorKey = str_replace("users_", '', $explodeKey[1]); // Menghapus 'users ' dari awal string
            $errorKey = str_replace('_unique', '', $errorKey); // Menghapus ' unique' dari akhir string
            $errorKey = str_replace('_', ' ', $errorKey); // Mengganti underscore dengan spasi
            $errorKey = ucwords($errorKey); // Membuat huruf pertama menjadi huruf besar
            return ('Duplikat  ' . $value . ' untuk ' . $errorKey . ' tersebut');
        } else {
            return $errorInfo[2];
        }
        return false;
    }
}
