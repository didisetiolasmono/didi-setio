<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$site="http://localhost/pernikahan/";
$aplikasi="PERNIKAHAN";

#koneksi
$con = new mysqli('localhost','root','','saw_pernikahan');
if($con->connect_error){
	die("Koneksi gagal: ".$con->connect_error);
}


#javascript
function javascript($m,$t,$pesan=''){//$t=redirect,alert,confirm
	global $site;
	if($t=='redirect'){
		echo "<script>window.location='".$site."$m';</script>";
	}elseif($t=='alert'){
		echo "<script>alert('$pesan');
				window.location='".$site."$m';</script>";
	}elseif($t=='confirm'){
		echo "			<script language='JavaScript'>
			function konfirmasi()
			{
			tanya = confirm('Anda Yakin Akan Menghapus Data ?');
			if (tanya == true) return true;
			else return false;
			}
			</script>";
	}
}

#autentikasi
function aut($level=array()){
	//aut(array(1,4));penggunaan
	global $site;
	if(!in_array($_SESSION[level],$level)){
		echo '<meta http-equiv="refresh" content="0; url='.$site.'" />';exit;
	}
}

#modul
function modul($m){
	global $con;
	global $site;
	if(empty($m)){
		include "modul/home/home.php";
	}elseif($m=='logout'){
		session_start();
		session_destroy();
		javascript('','redirect');
	}else{
		return include "modul/$m/$m.php";
	}
}



function saw(){
	global $con;
	
	#matriks & normalisasi
	$a=$con->query("SELECT * FROM penilaian a, alternatif b WHERE a.idAlternatif=b.idAlternatif GROUP BY a.idAlternatif");
	$i=0;
	while($ra=$a->fetch_object()){
		$q=$con->query("SELECT * FROM penilaian a, alternatif b, subkriteria c,kriteria d WHERE a.idAlternatif=b.idAlternatif AND a.idSubkriteria=c.idSubkriteria AND c.idKriteria=d.idKriteria AND a.idAlternatif='$ra->idAlternatif' ORDER BY d.idKriteria ASC");
		$j=0;
		while($rq=$q->fetch_object()){
			$nilai[$rq->idKriteria]=$rq->bobotSubkriteria;//
			$bobotKriteria[$rq->idKriteria]=$rq->bobotKriteria;
			$jenis[$rq->idKriteria]=$rq->jenis;
		$j++;
		}
		
		$maxNilai[$i]=max($nilai);
		$minNilai[$i]=min($nilai);
		foreach($nilai as $key => $ni){
			if($jenis[$key]==1){//benefit
				$normalisasiMatriks[] =$bobotKriteria[$key]*($ni/$maxNilai[$i]);
			}elseif($jenis[$key]==2){//cost
				$normalisasiMatriks[] =$bobotKriteria[$key]*($minNilai[$i]/$ni);
			}
		}
		#perangkingan
		$ranking[$ra->idAlternatif]=number_format(array_sum($normalisasiMatriks),3);
	$i++;
	}	
	return $ranking;	
	
}



?>