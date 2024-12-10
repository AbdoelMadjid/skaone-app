SELECT 
	 personil_sekolahs.gelardepan,
    personil_sekolahs.namalengkap,
    personil_sekolahs.gelarbelakang,
    kbm_per_rombels.kode_rombel,
    kbm_per_rombels.kel_mapel,
    kbm_per_rombels.id_personil,
    kbm_per_rombels.rombel,
    kbm_per_rombels.mata_pelajaran,
    peserta_didik_rombels.nis,
    peserta_didiks.nama_lengkap,
    nilai_formatif.*,
    nilai_sumatif.sts,
    nilai_sumatif.sas,
    nilai_sumatif.kel_mapel AS kel_mapel_sumatif,
    nilai_sumatif.rerata_sumatif,
    ((COALESCE(nilai_formatif.rerata_formatif, 0) + COALESCE(nilai_sumatif.rerata_sumatif, 0)) / 2) AS nilai_na
FROM kbm_per_rombels
INNER JOIN peserta_didik_rombels ON kbm_per_rombels.kode_rombel = peserta_didik_rombels.rombel_kode
INNER JOIN peserta_didiks ON peserta_didik_rombels.nis = peserta_didiks.nis
INNER JOIN nilai_formatif ON peserta_didik_rombels.nis = nilai_formatif.nis
INNER JOIN personil_sekolahs ON kbm_per_rombels.id_personil=personil_sekolahs.id_personil
LEFT JOIN nilai_sumatif ON peserta_didik_rombels.nis = nilai_sumatif.nis
    AND nilai_sumatif.id_personil = 'Pgw_0042' 
    AND nilai_sumatif.kode_rombel = '202442112-12TKJ3'
    AND nilai_sumatif.kel_mapel = 'A-02-UM'
WHERE 
    kbm_per_rombels.id_personil = 'Pgw_0042' AND 
    kbm_per_rombels.kode_rombel = '202442112-12TKJ3' AND 
    kbm_per_rombels.kel_mapel = 'A-02-UM'
    ORDER BY peserta_didik_rombels.nis
