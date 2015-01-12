<?php
namespace Concrete\Controller\SinglePage\Dashboard\Calendar;

use Concrete\Core\Calendar\Calendar;
use \Concrete\Core\Page\Controller\DashboardPageController;
use URL;

class Events extends DashboardPageController
{

    public function view($caID = null, $year = null, $month = null, $msg = null)
    {
        $calendars = Calendar::getList();
        if (count($calendars) == 0) {
            $this->redirect('/dashboard/calendar/add');
        }
        $defaultCalendar = $calendars[0];
        if ($caID) {
            $calendar = Calendar::getByID(intval($caID));
        }
        if (!$calendar) {
            $calendar = $defaultCalendar;
        }

        $this->set('calendars', $calendars);
        $this->set('calendar', $calendar);

        if (!$year) {
            $year = date('Y');
        }
        if (!$month) {
            $month = date('m');
        }

        $monthYearTimestamp = strtotime($year . '-' . $month . '-01');
        $firstDayInMonthNum = date('N', $monthYearTimestamp);
        if($firstDayInMonthNum == 7) {
            $firstDayInMonthNum = 0;
        }
        $nextLinkYear = $year;
        $previousLinkYear = $year;
        $nextLinkMonth = $month + 1;
        $previousLinkMonth = $month - 1;
        if ($month == 12) {
            $nextLinkMonth = 01;
        }
        if ($month == 01) {
            $previousLinkMonth = 12;
        }
        if ($month == 12) {
            $nextLinkYear = $year + 1;
        }
        if ($month == 01) {
            $previousLinkYear = $year - 1;
        }

        $nextLink = URL::to('/dashboard/calendar/events/view', $calendar->getID(), $nextLinkYear, $nextLinkMonth);
        $previousLink = URL::to('/dashboard/calendar/events/view', $calendar->getID(), $previousLinkYear, $previousLinkMonth);
        $todayLink = URL::to('/dashboard/calendar/events/view', $calendar->getID());
        $this->set('monthText', date('F', $monthYearTimestamp));
        $this->set('month', $month);
        $this->set('year', $year);
        $this->set('daysInMonth', date('t',$monthYearTimestamp));
        $this->set('firstDayInMonthNum', $firstDayInMonthNum);
        $this->set('nextLink', $nextLink);
        $this->set('previousLink', $previousLink);
        $this->set('todayLink', $todayLink);

        switch($msg) {
            case 'event_added':
                $this->set('success', t('Event added successfully.'));
                break;
        }
    }

}