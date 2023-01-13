<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SkillTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function narcisticNumber($nilai)
    {
        // $nilai = 1634;
        $array   = str_split($nilai);
        $nTotal = count($array);
        $sum = 0;
        
        foreach($array as $n){
            $sum += pow((int)$n, $nTotal);
        }	
        
        $hasil = ($sum===$nilai);
        if ($hasil == 1) return 'true';
        return 'false';
        // print_r($sum===$nilai);
    }

    public static function parityOutlier($nilai) {
        // $nilai = [2, 3, 0, 100, 3, 11, 2602, 36];
        $odds = [];
        $evens = [];
        foreach ($nilai as $n) {
          if ($n % 2) array_push($odds, $n);
          else array_push($evens, $n);
        }

        if(!empty($odds) or !empty($evens)){
            return 'false'; 
        }

        if (count($odds) > count($evens)){
            return implode(', ', $evens);
        }elseif (count($odds) < count($evens)){
            return implode(', ', $odds);
        }else{
            return 'false';
        }
    }

    
    public static function neddleInHaystack($needles, $haystack)
    {
        foreach($needles as $n=>$needle)
            if(strpos($haystack, $needle) !== false) return $n; //Munculkan Value
        return false;
    }

    public static function blueOceanReverse($a, $b)
    {
        $result = array_diff($a, $b);

        return implode(', ', $result);
    }

    public static function luasLingkaran(int $nilai){
        $jari = $nilai / 3;
        $pi  = 3.14;

        $hasil = $pi*($jari * $jari);
        return $hasil;
    }

    public static function kelilingLingkaran(int $nilai){
        $jari = $nilai / 5;
        $pi = 3.14;
        
        $hasil = 2*($pi*$jari);
        return $hasil;
    }

    public static function luasPersegi(int $nilai){
        $panjang = $nilai / 3;
        $lebar = $nilai / 5;
        $hasil = $panjang * $lebar;
        return $hasil;
    }

    public function pilihRumus(int $nilai){
        if(($nilai%3==0) && ($nilai%5==0)){
            $hasil = $this->luasPersegi($nilai);
        }else if($nilai%3==0){
            $hasil = $this->luasLingkaran($nilai);
        }else if($nilai%5==0 ){
            $hasil = $this->kelilingLingkaran($nilai);
        }else{
            $hasil = $nilai;
        }
        return $hasil;
    }


    public function index()
    {
        $hasil = 0;;
        for($i=1; $i<=100; $i++){
            $hasil = $this->pilihRumus($i);
            echo number_format($hasil,2).'<br>';
        }
    }
}

