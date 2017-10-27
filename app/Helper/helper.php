<?php 
// Helper Function //
function dua_minggu($tanggal)
{
    $dua_minggu = date('Y-m-d', strtotime('+2 week', strtotime($tanggal)));
    return $dua_minggu;
}

function explode_tanggal($tanggal)
{
	$explode = explode('-',$tanggal);
        switch ($explode[1]) {
            case '01':
                $bulan = 'Januari';
                break;
            
            case '02':
                $bulan = 'Februari';
                break;
            
            case '03':
                $bulan = 'Maret';
                break;
            
            case '04':
                $bulan = 'April';
                break;
            
            case '05':
                $bulan = 'Mei';
                break;
            
            case '06':
                $bulan = 'Juni';
                break;
            
            case '07':
                $bulan = 'Juli';
                break;
            
            case '08':
                $bulan = 'Agustus';
                break;
            
            case '09':
                $bulan = 'September';
                break;
            
            case '10':
                $bulan = 'Oktober';
                break;
            
            case '11':
                $bulan = 'November';
                break;
            
            case '12':
                $bulan = 'Desember';
                break;

            default:
                $bulan = 'Tidak Terdefinisi';
                break;
        }
    return $explode[2]." ".$bulan." ".$explode[0];
}

function rupiah($nilai)
{
    return 'Rp'.number_format($nilai,0,",",".");
}