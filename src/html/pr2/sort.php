<?php
    $num = $_GET['num'];
    $list = explode(',', $num);
    print_list($list);
    $list = shellSort($list);
    function shellSort($list) {
        $length = count($list);
        $d = (int) ($length / 2);
        while ($d > 0) {
            for ($i = 0; $i < $length - $d; $i++) {
                $j = $i;
                while (($j >= 0) && ($list[$j] > $list[$j + $d])) {
                    $t = $list[$j];
                    $list[$j] = $list[$j + $d];
                    $list[$j + $d] = $t;
                    $j -= $d;
                }
            }
            $d = (int) ($d / 2);
        }
        return $list;
    }
    function print_list($list) {
        foreach ($list as &$value){
            echo $value;
            echo " ";
        }
    }
    
    echo "<br/>";
    print_list($list);
?>
