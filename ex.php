<?php

use DevXyz\Challenge\PayDateCalculator;


$dateCalculater = new PayDateCalculator();

/* 
 * First @param string $paydateModel The paydate model, one of the items in the spec ( WEEKLY - BIWEEKLY - MONTHLY  )
 * Second @param string $paydateOne First paydate as a string in Y-m-d format
 * Third @param int $numberOfPaydates The number of paydates to generate
*/
return var_dump($dateCalculater->calculateNextPaydates("WEEKLY","2018-12-31",5)); 