<?php

    $str1 ="021020211002111010120220010202110001100011010010121110211010110201100010201";
    $str2 = "41424320313233205465737420546573742054657374";

// Need to devide string in 5 char each group
function trinaryToStr($str1){
  $rtn_data ="";
  $string_data = str_split($str1,5);
  for ($i=0; $i<count($string_data); $i++){
      $rtn_data .= base_convert($string_data[$i],3,16);
  }
  return hexToStr($rtn_data);
}

function hexToStr($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}
echo "<pre>
1.The Given string is encoded by Trinanry format. also called Ternanry or Base 3.
=> Step 1. I have been used base_convert() command in php to convert base 3 to base 16 from given string.
=> Step 2. From Base 16 i have used hexdec() decoder to text.

 </pre>";
echo "<b>Answer: </b>".trinaryToStr($str1)."<br/>";

echo "<pre>
2.The Given string is encoded by hexdecimal format.
=> Step 1. From hex i have used hexdec() decoder to text.
</pre>";

echo "<b>Answer: </b>".hexToStr($str2)."<br/>";

?>
