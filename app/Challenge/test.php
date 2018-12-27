<?php

 $holidays = (object)
["01-01-".date("Y")."","20-01-".date("Y")."","17-02-".date("Y")."","26-05-".date("Y")."",
"04-07-".date("Y")."","01-09-".date("Y")."","13-10-".date("Y")."","11-11-".date("Y")."",
"27-11-".date("Y")."","25-12-".date("Y")."","01-01-".date("Y",strtotime('+1 years'))."",
"19-01-".date("Y",strtotime('+1 years'))."",
"16-02-".date("Y",strtotime('+1 years'))."","25-05-".date("Y",strtotime('+1 years'))."",
"03-07-".date("Y",strtotime('+1 years'))."","07-09-".date("Y",strtotime('+1 years'))."",
"12-10-".date("Y",strtotime('+1 years'))."","11-11-".date("Y",strtotime('+1 years'))."",
"26-11-".date("Y",strtotime('+1 years'))."","25-12-".date("Y",strtotime('+1 years')).""];


foreach($holidays as $objectHoliday)
{
    echo date("Y-m-d",strtotime($objectHoliday)).'   ';
}