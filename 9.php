<?php
    $states="Mississippi Alabama Texas Massachusetts Kansas";
    $list=array();
    $keywords=preg_split("/\s+/",$states);
    foreach ($keywords as $word)
    {
        if(preg_match('/xas$/', $word))
        {
            echo "Word $word ends in xas <br>";
            $list[0]=$word;
        }
    }
    foreach ($keywords as $word)
    {
        if(preg_match('/^k.*s$/i', $word))
        {
            echo "Word $word begins with k and ends in s <br>";
            $list[1]=$word;
        }
    }
    foreach ($keywords as $word)
    {
        if(preg_match('/^M.*s$/', $word))
        {
            echo "Word $word begins with M and ends in s <br>";
            $list[2]=$word;
        }
    }
    foreach ($keywords as $word)
    {
        if(preg_match('/a$/', $word))
        {
            echo "Word $word ends in a <br>";
            $list[3]=$word;
        }
    }
    print_r($list);
?>