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
if (!function_exists('menus')) {
    function menus()
    {
        // $menus = DB::table('menus')->pluck('id', 'name', 'key', 'jenis', 'parent_id');
        $menus = DB::table('menus')->select('id', 'name', 'key', 'jenis', 'parent_id', 'slug', 'deletable', 'editable')->get()->toArray();
        return susunMenu($menus);
    }
}
if (!function_exists('formatWhatsAppNumber')) {
    function formatWhatsAppNumber($number, $message = '')
    {
        // Remove any non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);

        // Check if the number starts with '08' and replace it with '62'
        if (substr($number, 0, 2) == '08') {
            $number = '628' . substr($number, 2);
        } else if (substr($number, 0, 3) == '+62') {
            $number = '62' . substr($number, 3);
        }

        return 'https://wa.me/' . $number . '/?text=' . urlencode("Selamat datang di Mall Pelayanan Publik, silahkan isi data dibawah\n \nNama : \nAlamat : \nNIK : \n\n Tulis pesan ini : ");
    }
}
if (!function_exists('profile')) {
    function profile()
    {
        return DB::table('profiles')->select('*')->first();
    }
}
if (!function_exists('category')) {
    function category()
    {
        $category = DB::table('ref_contents')->get()->toArray();
        return $category;
    }
}
if (!function_exists('susunParent')) {
    function susunParent($data, &$result = [])
    {
        if ($data->parent) {
            $result[] = ['slug' => $data->slug, 'name' => $data->name, 'jenis' => $data->jenis];
            return susunParent($data->parent, $result);
        } else {
            // echo "itlast";
            // die();
            $result[] = ['slug' => $data->slug, 'name' => $data->name, 'jenis' => $data->jenis];
            return $result;
        }
    }
}
if (!function_exists('susunMenu')) {
    function susunMenu($menuItems, $parentId = null)
    {
        $menu = [];
        foreach ($menuItems as $item) {
            // dd($item->parent_id);
            if ($item->parent_id == $parentId) {
                $menuItem = $item;
                $menuItem->children = susunMenu($menuItems, $item->id);
                $menu[] = $menuItem;
            }
        }
        return $menu;
    }
}
if (!function_exists('extractImageNames')) {
    function extractImageNames($content)
    {
        $pattern = '/<img[^>]+src="([^"]+)"/';
        preg_match_all($pattern, $content, $matches);

        $imageNames = [];
        foreach ($matches[1] as $src) {
            $imageName = basename(parse_url($src, PHP_URL_PATH));
            $imageNames[] = $imageName;
        }

        return $imageNames;
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
