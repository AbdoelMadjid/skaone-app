<?php

use App\Models\AppSupport\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

if (!function_exists('responseError')) {
    function responseError(\Exception | string $th)
    {
        $message = 'Terjadi kesalahan, silahkan coba beberapa saat lagi';
        if ($th instanceof \Exception) {
            if (config('app.debug')) {
                $message = $th->getMessage();
                $message .= ' in line ' . $th->getLine() . ' at ' . $th->getFile();
                $data = $th->getTrace();
            }
        } else {
            $message = $th;
        }

        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $data ?? null
        ], 500);
    }
}

if (!function_exists('responseSuccess')) {
    function responseSuccess($isEdit = false)
    {
        return response()->json([
            'status' => 'success',
            'message' => $isEdit ? 'Data sukses di update' : 'Data sukses di tambahkan',
        ]);
    }
}

if (!function_exists('responseSuccessDelete')) {
    function responseSuccessDelete()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Data sukses di hapus',
        ]);
    }
}

if (!function_exists('responseWarning')) {
    function responseWarning($message = 'Warning occurred.')
    {
        return response()->json([
            'status' => 'warning',
            'message' => $message,
        ]);
    }
}

if (!function_exists('menus')) {
    /**
     * @return Collection
     */

    function menus()
    {
        if (!Cache::has('menus')) {
            $menus = (new MenuRepository())->getMenus()->groupBy('category');

            Cache::forever('menus', $menus);
        } else {
            $menus = Cache::get('menus');
        }

        return $menus;
    }
}

if (!function_exists('urlMenu')) {
    function urlMenu()
    {
        if (!Cache::has('urlMenu')) {

            $menus = menus()->flatMap(fn($item) => $item);

            $url = [];
            foreach ($menus as $mm) {
                $url[] = $mm->url;
                foreach ($mm->subMenus as $sm) {
                    $url[] = $sm->url;
                }
            }

            Cache::forever('urlMenu', $url);
        } else {
            $url = Cache::get('urlMenu');
        }

        return $url;
    }
}

if (!function_exists('notifications')) {
    function notifications()
    {
        return user()->unreadNotifications;
    }
}

if (!function_exists('user')) {
    /**
     * @param string $id
     * @return \App\Models\User | string
     */
    function user($id = null)
    {
        if ($id) {
            return request()->user()->{$id};
        }
        return request()->user();
    }
}

if (!function_exists('terbilang')) {
    function terbilang($number)
    {
        $number = abs($number);
        $words = [
            "",
            "satu",
            "dua",
            "tiga",
            "empat",
            "lima",
            "enam",
            "tujuh",
            "delapan",
            "sembilan",
            "sepuluh",
            "sebelas"
        ];

        $result = "";

        if ($number < 12) {
            $result = $words[$number];
        } elseif ($number < 20) {
            $result = $words[$number - 10] . " belas";
        } elseif ($number < 100) {
            $result = $words[(int)($number / 10)] . " puluh " . terbilang($number % 10);
        } elseif ($number < 200) {
            $result = "seratus " . terbilang($number - 100);
        } elseif ($number < 1000) {
            $result = $words[(int)($number / 100)] . " ratus " . terbilang($number % 100);
        } elseif ($number < 2000) {
            $result = "seribu " . terbilang($number - 1000);
        } elseif ($number < 1000000) {
            $result = terbilang((int)($number / 1000)) . " ribu " . terbilang($number % 1000);
        } elseif ($number < 1000000000) {
            $result = terbilang((int)($number / 1000000)) . " juta " . terbilang($number % 1000000);
        } elseif ($number < 1000000000000) {
            $result = terbilang((int)($number / 1000000000)) . " milyar " . terbilang($number % 1000000000);
        } elseif ($number < 1000000000000000) {
            $result = terbilang((int)($number / 1000000000000)) . " triliun " . terbilang($number % 1000000000000);
        }

        return ucfirst(trim($result));
    }
}

function formatTanggalIndonesia($tanggal)
{
    // Pastikan tanggal valid
    if (!$tanggal) {
        return '-';
    }

    // Daftar nama bulan dalam bahasa Indonesia
    $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    // Pisahkan tanggal menjadi hari, bulan, dan tahun
    $tanggalObj = date_create($tanggal);
    $hari = date_format($tanggalObj, 'd');
    $bulanIndex = date_format($tanggalObj, 'n');
    $tahun = date_format($tanggalObj, 'Y');

    // Format tanggal
    return "{$hari} {$bulan[$bulanIndex]} {$tahun}";
}
