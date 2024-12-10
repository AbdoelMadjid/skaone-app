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
	nilai_formatif.tp_isi_1,
	nilai_formatif.tp_isi_2,
	nilai_formatif.tp_isi_3,
	nilai_formatif.tp_isi_4,
	nilai_formatif.tp_isi_5,
	nilai_formatif.tp_isi_6,
	nilai_formatif.tp_isi_7,
	nilai_formatif.tp_isi_8,
	nilai_formatif.tp_isi_9,
	nilai_formatif.tp_nilai_1,	
	nilai_formatif.tp_nilai_2,	
	nilai_formatif.tp_nilai_3,	
	nilai_formatif.tp_nilai_4,	
	nilai_formatif.tp_nilai_5,	
	nilai_formatif.tp_nilai_6,	
	nilai_formatif.tp_nilai_7,	
	nilai_formatif.tp_nilai_8,	
	nilai_formatif.tp_nilai_9,
	nilai_formatif.rerata_formatif,		
	nilai_sumatif.sts,
	nilai_sumatif.sas,
	nilai_sumatif.kel_mapel AS kel_mapel_sumatif,
	nilai_sumatif.rerata_sumatif,
	((COALESCE(nilai_formatif.rerata_formatif, 0) + COALESCE(nilai_sumatif.rerata_sumatif, 0)) / 2) AS nilai_na
FROM kbm_per_rombels
	INNER JOIN peserta_didik_rombels ON kbm_per_rombels.kode_rombel = peserta_didik_rombels.rombel_kode
	INNER JOIN peserta_didiks ON peserta_didik_rombels.nis = peserta_didiks.nis
	INNER JOIN personil_sekolahs ON kbm_per_rombels.id_personil=personil_sekolahs.id_personil
LEFT JOIN nilai_formatif ON peserta_didik_rombels.nis = nilai_formatif.nis
	AND nilai_formatif.id_personil = 'Pgw_0003' 
	AND nilai_formatif.kode_rombel = '202483312-12AK1'
	AND nilai_formatif.kel_mapel = 'B3-02-KK-AK'
LEFT JOIN nilai_sumatif ON peserta_didik_rombels.nis = nilai_sumatif.nis
	AND nilai_sumatif.id_personil = 'Pgw_0003' 
	AND nilai_sumatif.kode_rombel = '202483312-12AK1'
	AND nilai_sumatif.kel_mapel = 'B3-02-KK-AK'
WHERE 
	kbm_per_rombels.id_personil = 'Pgw_0003' AND 
	kbm_per_rombels.kode_rombel = '202483312-12AK1' AND 
	kbm_per_rombels.kel_mapel = 'B3-02-KK-AK'
ORDER BY peserta_didik_rombels.nis
