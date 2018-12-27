<?php

namespace DevXyz\Challenge;

interface PaydateCalculatorInterface
{

    /**
     * takes a paydate model and first paydate and generates the next $numberOfPaydates paydates.
     *
     * @param string $paydateModel The paydate model, one of the items in the spec
     * @param string $paydateOne First paydate as a string in Y-m-d format, different from the second
     * @param int $numberOfPaydates The number of paydates to generate
     *
     * @throws \InvalidArgumentException
     *
     * @return array the next paydates (from today) as strings in Y-m-d format
     */
    public function calculateNextPaydates($paydateModel, $paydateOne, $numberOfPaydates);

    /**
     * determines whether a given date in Y-m-d format is a holiday.
     *
     * @param string $date A date as a string formatted as Y-m-d
     *
     * @return bool whether or not the given date is on a holiday
     */
    public function isHoliday($date): bool;

    /**
     * determines whether a given date in Y-m-d format is on a weekend.
     *
     * @param string $date A date as a string formatted as Y-m-d
     *
     * @return bool whether or not the given date is on a weekend
     */
    public function isWeekend($date);//: bool;

    /**
     * determines whether a given date in Y-m-d format is a valid paydate according to specification rules.
     *
     * @param string $date A date as a string formatted as Y-m-d
     *
     * @return bool whether or not the given date is a valid paydate
     */
    public function isValidPaydate($date);//: bool;

    /**
     * increases a given date in Y-m-d format by $count $units
     *
     * @param string $date A date as a string formatted as Y-m-d
     * @param integer $count The amount of units to increment
     * @param string $unit adjustment unit
     *
     * @return string the calculated day's date as a string in Y-m-d format
     */
    public function increaseDate($date, $count, $unit = 'days');//: string;

    /**
     * decreases a given date in Y-m-d format by $count $units
     *
     * @param string $date A date as a string formatted as Y-m-d
     * @param integer $count The amount of units to decrement
     * @param string $unit adjustment unit
     *
     * @return string the calculated day's date as a string in Y-m-d format
     */
    public function decreaseDate($date, $count, $unit = 'days');//: string;

    /**
     * @param string $date
     * @return bool whether or not the given date string is an actual valid date
     */
    public function isValidDate($date);//: bool;

    /**
     * returns a first available paydate that comes after the given date
     *
     * @param string $date
     * @return string
     */
    public function getFirstPaydateAfter($date);//: string;
}
