<?php

use DevXyz\Challenge\PayDateCalculator;


$dateCalculater = new PayDateCalculator();

return var_dump($dateCalculater->calculateNextPaydates("MONTHLY","2018-12-31",5)); 