<?php

namespace App\Repositories;

use Carbon\Carbon;

trait ActiveRunwayLogic
{
    public function getActiveRunways()
    {
        $this->setActiveRunways();
        $this->activeArrivals = $this->runways->where('activeArrivals', '=', true)->first();
        $this->activeDepartures = $this->runways->where('activeDepartures', '=', true)->first();
    }

    public function setActiveRunways()
    {
        if ($this->metar->wind_variable || $this->metar->wind_calm) {
            $preffered_arrival = $this->getpreffered_arrivalRunway();
            $prefferedDeparture = $this->getPrefferedDepartureRunway();

            $this->setArrivalRunway($preffered_arrival);
            $this->setDepartureRunway($prefferedDeparture);
        } else {
            //Find the active runway not by the wind component but by some rules
            $rules = $this->airportsRulesForActiveRunway($this->icao);

            //If the airport has not rules find the active runway by wind component
            if (!$rules) {
                $activeRunwayDesignator = $this->calculateActiveRunwayByWindComponent();

                $this->setArrivalRunway($activeRunwayDesignator);
                $this->setDepartureRunway($activeRunwayDesignator);
            }
        }
    }

    /**
     * [calculateActiveRunwayByWindComponent Calculates the active runway based on the wind component of the airport metar and the runway heading
     * The active runway is the one with the maximum wind component.
     * Hint: A positive number basically means that that the runway has a HEADWIND component of that number. The actual wind component is the negative number]
     * @return string Runway Designator
     */
    private function calculateActiveRunwayByWindComponent()
    {
        foreach ($this->runways as $runway) {
            $windComponents[$runway->designator] = calculateWindComponent($this->metar->wind_direction, $this->metar->wind_speed, $runway->heading);
        }

        return array_search(max($windComponents), $windComponents);
    }

    private function setArrivalRunway($activeRunwayDesignator)
    {
        foreach ($this->runways as $runway) {
            if ($runway->designator == $activeRunwayDesignator) {
                return $runway->activeArrivals = true;
            }
        }
    }

    private function setDepartureRunway($activeRunwayDesignator)
    {
        foreach ($this->runways as $runway) {
            if ($runway->designator == $activeRunwayDesignator) {
                return $runway->activeDepartures = true;
            }
        }
    }

    private function getpreffered_arrivalRunway()
    {
        $runway = $this->runways
                ->where('preferred_arrival', '=', 1)
                ->first()
                ->designator;

        return $runway;
    }

    private function getPrefferedDepartureRunway()
    {
        $runway = $this->runways
                ->where('preferred_departure', '=', 1)
                ->first()
                ->designator;

        return $runway;
    }

    /**
     * [airportsRulesForActiveRunway Define special rules for runway selection]
     * @param  string $icao [Airport ICAO]
     * @return boolean       true -> rule found, false -> rule not found
     */
    private function airportsRulesForActiveRunway($icao)
    {
        switch ($icao) {
          case 'LGAL':
          if ($this->checkWindSpeedBelowValue(3)) {
              $this->setArrivalRunway('07');
              $this->setDepartureRunway('25');
          } elseif ($this->checkWindComponentAboveValue(070, -3)) {
              $this->setArrivalRunway('07');
              $this->setDepartureRunway('07');
          } else {
              $this->setArrivalRunway('25');
              $this->setDepartureRunway('25');
          }
          return true;
          break;

          case 'LGAV':
          if ($this->checkWindComponentAboveValue(034, -5)) {
              if ($this->checkNoiseAbatement('23:00', '07:00') || $this->checkNoiseAbatement('09:00', '18:00', false)) {
                  $this->setArrivalRunway('03R');
                  $this->setDepartureRunway('03L');
                  $this->message = 'Noise Abatement Procedures in force.';
              } else {
                  $this->setArrivalRunway('03L');
                  $this->setDepartureRunway('03R');
              }
          } else {
              $this->setArrivalRunway('21R');
              $this->setDepartureRunway('21L');
          }
          return true;
          break;

          case 'LGEL':
          if ($this->checkVisibilityBelowValue(5000)) {
              $this->setArrivalRunway('36');
              $this->setDepartureRunway('18');
          } elseif ($this->checkCloudBelowValue('BKN', 1700) || $this->checkCloudBelowValue('OVC', 1700)) {
              $this->setArrivalRunway('36');
              $this->setDepartureRunway('18');
          } elseif ($this->checkWindSpeedBelowValue(3)) {
              $this->setArrivalRunway('36');
              $this->setDepartureRunway('18');
          } elseif ($this->checkWindComponentAboveValue(358, 0)) {
              $this->setArrivalRunway('36');
              $this->setDepartureRunway('36');
          } else {
              $this->setArrivalRunway('18');
              $this->setDepartureRunway('18');
          }
          return true;
          break;

          case 'LGIO':
          if ($this->checkWindSpeedBelowValue(3)) {
              $this->setArrivalRunway('32');
              $this->setDepartureRunway('14');
          } elseif ($this->checkWindComponentAboveValue(319, -3)) {
              $this->setArrivalRunway('32');
              $this->setDepartureRunway('32');
          } else {
              $this->setArrivalRunway('14');
              $this->setDepartureRunway('14');
          }
          return true;
          break;

          case 'LGIR':
          if ($this->checkWindComponentAboveValue(272, -3)) {
              $this->setArrivalRunway('27');
              $this->setDepartureRunway('27');
          } elseif ($this->checkWindComponentAboveValue(272, -7)) {
              $this->setArrivalRunway('27');
              $this->setDepartureRunway('09');
          } else {
              $this->setArrivalRunway('09');
              $this->setDepartureRunway('09');
          }
          return true;
          break;

          case 'LGKR':
          if ($this->checkWindSpeedBelowValue(3)) {
              $this->setArrivalRunway('35');
              $this->setDepartureRunway('17');
          } elseif ($this->checkWindComponentAboveValue(345, -3)) {
              $this->setArrivalRunway('35');
              $this->setDepartureRunway('35');
          } else {
              $this->setArrivalRunway('17');
              $this->setDepartureRunway('17');
          }
          return true;
          break;

          case 'LGMK':
          if ($this->checkWindComponentAboveValue(157, -3)) {
              if ($this->checkNight()) {
                  $this->setArrivalRunway('34');
                  $this->message = 'Visual approach not allowed for Runway 16 during the night.';
              } else {
                  $this->setArrivalRunway('16');
              }

              $this->setDepartureRunway('16');
          } else {
              $this->setArrivalRunway('34');
              $this->setDepartureRunway('34');
          }
          return true;
          break;

          case 'LGMT':
          if ($this->checkWindSpeedBelowValue(3)) {
              $this->setArrivalRunway('14');
              $this->setDepartureRunway('32');
          } elseif ($this->checkWindComponentAboveValue(144, -3)) {
              $this->setArrivalRunway('14');
              $this->setDepartureRunway('14');
          } else {
              $this->setArrivalRunway('32');
              $this->setDepartureRunway('32');
          }
          return true;
          break;

          case 'LGSM':
          if ($this->checkWindComponentAboveValue(91, -10)) {
              $this->setArrivalRunway('09');
              $this->setDepartureRunway('09');
          } else {
              $this->setArrivalRunway('27');
              $this->setDepartureRunway('27');
          }
          return true;
          break;

          case 'LGTS':
          if ($this->checkVisibilityBelowValue(5000)) {
              $this->setArrivalRunway('16');
              $this->setDepartureRunway('16');
          } elseif ($this->checkCloudBelowValue('BKN', 1300) || $this->checkCloudBelowValue('OVC', 1300)) {
              $this->setArrivalRunway('16');
              $this->setDepartureRunway('16');
          } elseif ($this->checkWindComponentAboveValue(163, 0)) {
              $this->setArrivalRunway('16');
              $this->setDepartureRunway('16');
          } else {
              $this->setArrivalRunway('34');
              $this->setDepartureRunway('34');
          }
          return true;
          break;

          default:
          return false;
          break;
        }
    }

    private function checkVisibilityBelowValue($value)
    {
        return $this->metar->visibility < $value ? true : false;
    }

    private function checkVisibilityAboveValue($value)
    {
        return $this->metar->visibility > $value ? true : false;
    }

    private function checkWindComponentAboveValue($heading, $value)
    {
        return calculateWindComponent($this->metar->wind_direction, $this->metar->wind_speed, $heading) >= $value ? true : false;
    }

    private function checkWindComponentBelowValue($heading, $value)
    {
        return calculateWindComponent($this->metar->wind_direction, $this->metar->wind_speed, $heading) <= $value ? true : false;
    }

    private function checkWindSpeedBelowValue($value)
    {
        return $this->metar->wind_speed < $value ? true : false;
    }

    private function checkCloudBelowValue($cover, $base)
    {
        foreach ($this->metar->clouds as $cloud) {
            if ($cloud->cover == $cover && $cloud->base <= $base) {
                return true;
            }
        }

        return false;
    }

    private function checkNoiseAbatement($from, $to, $twoDays = true)
    {
        $now = Carbon::now('Europe/Athens');

        if ($twoDays) {
            if (Carbon::parse('today '.$from.' Europe/Athens') < $now && $now <= Carbon::parse('tomorrow '.$to.' Europe/Athens')) {
                return true;
            }
            return false;
        } else {
            if (Carbon::parse('today '.$from.' Europe/Athens') < $now && $now <= Carbon::parse('today '.$to.' Europe/Athens')) {
                return true;
            }
            return false;
        }
    }

    public function checkNight()
    {
        if (time()>= date_sunset(time(), SUNFUNCS_RET_TIMESTAMP, $this->lat, $this->lon, 90, 0) && time()<= date_sunrise(strtotime("tomorrow"), SUNFUNCS_RET_TIMESTAMP, $this->lat, $this->lon, 90, 0) || time()>= date_sunset(strtotime("yesterday"), SUNFUNCS_RET_TIMESTAMP, $this->lat, $this->lon, 90, 0) && time()<= date_sunrise(time(), SUNFUNCS_RET_TIMESTAMP, $this->lat, $this->lon, 90, 0)) {
            return true;
        }

        return false;
    }
}
