<?php
function format_uang($jumlah_total){
     $hasil=number_format($jumlah_total,0,',','.');
return $hasil;
}