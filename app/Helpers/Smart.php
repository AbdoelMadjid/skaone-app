<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getRoleName')) {
    function getRoleName()
    {
        $user = Auth::user();

        // Array untuk mapping role names ke display names
        $displayNames = [
            'master' => 'Master',
            'admin' => 'Administrator',
            'kepsek' => 'Kepala Sekolah',
            'guru' => 'Tenaga Pendidik',
            'tatausaha' => 'Tenaga Kependidikan',
            'wakasek' => 'Wakil Kepala Sekolah',
            'kaprog' => 'Ketua Program Studi',
            'gmapel' => 'Guru Mata Pelajaran',
            'walas' => 'Wali Kelas',
            'siswa' => 'Peserta Didik',
            'tamu' => 'Pengunjung',
            'pembpkl' => 'Pembimbing PKL',
            'adminpkl' => 'Administrator PKL',
            'pesertapkl' => 'Peserta PKL',
            'kaprodiak' => 'Kaprodi AK',
            'kaprodibd' => 'Kaprodi BD',
            'kaprodimp' => 'Kaprodi MP',
            'kaprodirpl' => 'Kaprodi RPL',
            'kaproditkj' => 'Kaprodi TKJ',
            'bpbk' => 'Bimbingan Konseling',
            'alumni' => 'Alumni',
            'panitiapkl' => 'Panitia PKL',
            'kaprakerinak' => 'Panitia Prakerin AK',
            'kaprakerinbd' => 'Panitia Prakerin BD',
            'kaprakerinmp' => 'Panitia Prakerin MP',
            'kaprakerinrpl' => 'Panitia Prakerin RPL',
            'kaprakerintkj' => 'Panitia Prakerin TKJ',
            'guruprakerin' => 'Guru Pembimbing PKL',
            'siswaprakerin' => 'Siswa Peserta PKL',
            'guruwali' => 'Guru Wali',
        ];

        if ($user && $user->roles->isNotEmpty()) {
            $roleName = $user->roles->first()->name;
            // Mengembalikan display name jika ada, atau role name default
            return $displayNames[$roleName] ?? $roleName;
        }

        return null;
    }
}

if (!function_exists('renderGreeting')) {
    function renderGreeting()
    {
        // Set the time zone to your local time zone (e.g., "Asia/Jakarta")
        $date = Carbon::now('Asia/Jakarta');

        // Determine the greeting based on the current time
        $hour = $date->hour;
        if ($hour >= 0 && $hour < 12) {
            $greeting = "Selamat Pagi";
        } elseif ($hour >= 12 && $hour < 15) {
            $greeting = "Selamat Siang";
        } elseif ($hour >= 15 && $hour < 18) {
            $greeting = "Selamat Sore";
        } else {
            $greeting = "Selamat Malam";
        }

        // Return the greeting HTML
        return "<span id='greeting-display'>$greeting</span>";
    }
}

if (!function_exists('renderDate')) {
    function renderDate()
    {
        $date = Carbon::now('Asia/Jakarta');

        $dayNames = [
            0 => "<font color='red'>Minggu</font>",
            1 => "Senin",
            2 => "Selasa",
            3 => "Rabu",
            4 => "Kamis",
            5 => "<font color='#1f9d81'><b>Jum'at</b></font>",
            6 => "Sabtu"
        ];
        $monthNames = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ];

        $day = $dayNames[$date->dayOfWeek];
        $daym = $date->day;
        $month = $monthNames[$date->month - 1];
        $year = $date->year;

        // Hijri date calculation
        $hijriDate = toHijriah($date);

        // Return the formatted date HTML
        return "<span id='date-display'>$day, $daym $month $year M ( $hijriDate )</span>";
    }
}

if (!function_exists('renderTime')) {
    function renderTime($id = 'time-display')
    {
        $date = Carbon::now('Asia/Jakarta');
        $formattedTime = $date->format('H:i:s');

        // Return the initial time display with JavaScript to update it dynamically
        return "<span id='$id'>$formattedTime</span>
                <script>
                    function startClock(id) {
                        let timeDisplay = document.getElementById(id);

                        function updateTime() {
                            const now = new Date();
                            let hours = now.getHours();
                            let minutes = now.getMinutes();
                            let seconds = now.getSeconds();

                            // Format time as 24-hour clock
                            hours = hours < 10 ? '0' + hours : hours;
                            minutes = minutes < 10 ? '0' + minutes : minutes;
                            seconds = seconds < 10 ? '0' + seconds : seconds;

                            // Update the time display
                            timeDisplay.textContent = hours + ':' + minutes + ':' + seconds;
                        }

                        updateTime(); // Initial call to set the time immediately
                        setInterval(updateTime, 1000); // Update time every second
                    }

                    startClock('$id');
                </script>";
    }
}


if (!function_exists('toHijriah')) {
    function toHijriah($date)
    {
        $array_month = [
            "Muharram",
            "Safar",
            "Rabiul Awwal",
            "Rabiul Akhir",
            "Jumadil Awwal",
            "Jumadil Akhir",
            "Rajab",
            "Sya'ban",
            "Ramadhan",
            "Syawwal",
            "Zulqaidah",
            "Zulhijjah"
        ];

        $day = $date->day;
        $month = $date->month;
        $year = $date->year;

        // Julian Day calculation
        if (($year > 1582) || (($year == 1582) && ($month > 10)) || (($year == 1582) && ($month == 10) && ($day > 14))) {
            $jd = intval((1461 * ($year + 4800 + intval(($month - 14) / 12))) / 4) +
                intval((367 * ($month - 2 - 12 * (intval(($month - 14) / 12)))) / 12) -
                intval((3 * (intval(($year + 4900 + intval(($month - 14) / 12)) / 100))) / 4) +
                $day - 32075;
        } else {
            $jd = 367 * $year - intval((7 * ($year + 5001 + intval(($month - 9) / 7))) / 4) +
                intval((275 * $month) / 9) + $day + 1729777;
        }

        // Hijri date calculation
        $l = $jd - 1948440 + 10632;
        $n = intval(($l - 1) / 10631);
        $l = $l - 10631 * $n + 354;
        $z = (intval((10985 - $l) / 5316)) * (intval((50 * $l) / 17719)) + (intval($l / 5670)) * (intval((43 * $l) / 15238));
        $l = $l - (intval((30 - $z) / 15)) * (intval((17719 * $z) / 50)) - (intval($z / 16)) * (intval((15238 * $z) / 43)) + 29;
        $m = intval((24 * $l) / 709);
        $d = $l - intval((709 * $m) / 24);
        $y = 30 * $n + $z - 30;
        $g = $m - 1;

        return "$d " . $array_month[$g] . " $y H";
    }
}



function generateRandomText($length = 10)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomText = '';

    for ($i = 0; $i < $length; $i++) {
        $randomText .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomText;
}

if (!function_exists('warnaDariId')) {
    function warnaDariId($id)
    {
        $hash = crc32($id);
        $hex = substr(dechex($hash), 0, 6);
        return '#' . str_pad($hex, 6, '0', STR_PAD_RIGHT);
    }
}

if (!function_exists('kontrasTeks')) {
    function kontrasTeks($bg)
    {
        $r = hexdec(substr($bg, 1, 2));
        $g = hexdec(substr($bg, 3, 2));
        $b = hexdec(substr($bg, 5, 2));
        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
        return $luminance > 0.5 ? '#000' : '#fff';
    }
}
