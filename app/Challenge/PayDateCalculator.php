<?php /* ~(˘▾˘~) Good Luck (~˘▾˘)~ */

namespace DevXyz\Challenge;

use DevXyz\Challenge\PaydateCalculatorInterface;

class PayDateCalculator implements PaydateCalculatorInterface
{
    protected $holidays;
    
    public function __construct()
    {
        $this->holidays = (object) ["01-01-".date("Y")."","20-01-".date("Y")."",
        "17-02-".date("Y")."","26-05-".date("Y")."",
        "04-07-".date("Y")."","01-09-".date("Y")."","13-10-".date("Y")."","11-11-".date("Y")."",
        "27-11-".date("Y")."","25-12-".date("Y")."","01-01-".date("Y",strtotime('+1 years'))."",
        "14-01-".date("Y",strtotime('+1 years'))."",
        "16-02-".date("Y",strtotime('+1 years'))."","25-05-".date("Y",strtotime('+1 years'))."",
        "03-07-".date("Y",strtotime('+1 years'))."","07-09-".date("Y",strtotime('+1 years'))."",
        "12-10-".date("Y",strtotime('+1 years'))."","11-11-".date("Y",strtotime('+1 years'))."",
        "26-11-".date("Y",strtotime('+1 years'))."","25-12-".date("Y",strtotime('+1 years')).""];
    }
    
    


   
    public function calculateNextPaydates($paydateModel, $paydateOne, $numberOfPaydates)
    {
        if($this->isValidDate($paydateOne) && $this->isValidPaydate($paydateOne))
            {
                $firstPaydateOne = $this->getFirstPaydateAfter($paydateOne);
                $dates_list = [];
                $current_date = $firstPaydateOne;
                for($counter =1; $counter <= $numberOfPaydates; $counter++)
                {
                     $next_date =$this->increaseDate($current_date, $counter*($this->checkPayDateModel($paydateModel)),'days');
                     array_push($dates_list,$this->getFirstPaydateAfter($next_date));
                }
                return $dates_list;
            }
            else 
            {
                return array('response' => "Not a valid date" );
            }
    }

    public function checkPayDateModel($paydateModel)
    {
        switch ($paydateModel) {
            case "MONTHLY":
                return 30;
                break;
            case "BIWEEKLY":
                return 14;
                break;
            case "WEEKLY":
                return 7;
                break;
            default:
                return 7;
        }
    }

    public function getFirstPaydateAfter($paydateOne)
    { 
        if($this->isWeekend($paydateOne))
         {
            if(date('D',strtotime($paydateOne)) == "Sun")
            {
                $validatedPayDateOne = $this->increaseDate($paydateOne, 1,'days');
                return $this->CheckAndModifyHoliday($validatedPayDateOne);
            }
            if(date('D',strtotime($paydateOne)) == "Sat")
            {
                $validatedPayDateOne = $this->increaseDate($paydateOne, 2,'days');
                return $this->CheckAndModifyHoliday($validatedPayDateOne);
            }
         }

         else
         {
            return $this->CheckAndModifyHoliday($paydateOne);
         }
    }

    public function CheckAndModifyHoliday($date){
        if($this->isHoliday($date) && date('D',strtotime($date)) != "Mon")
        {
            $validatedHolidayPayDate = $this->decreaseDate($date, 1,'days');
             return $this->getFirstPaydateAfter($validatedHolidayPayDate);
        }
        else if($this->isHoliday($date) && date('D',strtotime($date)) == "Mon")
        {
            $validatedHolidayPayDate = $this->decreaseDate($date, 3,'days');
             return $this->getFirstPaydateAfter($validatedHolidayPayDate);
        }
        else 
        {
            return $date;
        }
        
    }

    public function isHoliday($date)
    {   
        foreach($this->holidays as $holiday)
        if($date == date("Y-m-d",strtotime($holiday)))
        {
            return true;
        } 
        return false;
    }

    public function isWeekend($date)
    {
        if(date('D',strtotime($date)) == "Sun" || date('D',strtotime($date)) == "Sat" )
        {
            return true;
        }
        return false;
    }
    public function isValidPaydate($date)
    {
        if(date('Y-m-d',strtotime($date)) == date('Y-m-d') )
        {
            return false;
        }
        return true;
    }

    public function increaseDate($date, $count, $unit = 'days')
    {
        return  date('Y-m-d', strtotime($date. ' + '.$count.' '.$unit.''));
    }
    public function decreaseDate($date, $count, $unit = 'days')
    {
        return  date('Y-m-d', strtotime($date. ' - '.$count.' '.$unit.''));
    }

    public function isValidDate($date)
    {
        if (checkdate((new \DateTime($date))->format('m'),
                      (new \DateTime($date))->format('d'),
                      (new \DateTime($date))->format('Y')))
        {
            return true;
        }
        return false;
    }
 
    
}