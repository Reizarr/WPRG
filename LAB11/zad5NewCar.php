<?php
class NewCar extends Car {
    private $alarm;
    private $radio;
    private $climatronic;
    public function __construct($model, $price, $exchangeRate, $alarm, $radio, $climatronic) {
        parent::__construct($model, $price, $exchangeRate);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->climatronic = $climatronic;
    }
    public function getAlarm() {
        return $this->alarm;
    }
    public function setAlarm($alarm) {
        $this->alarm = $alarm;
    }
    public function getRadio() {
        return $this->radio;
    }
    public function setRadio($radio) {
        $this->radio = $radio;
    }
    public function getClimatronic() {
        return $this->climatronic;
    }
    public function setClimatronic($climatronic) {
        $this->climatronic = $climatronic;
    }
    public function value() {
        $baseValue = parent::value();
        if ($this->alarm) {
            $baseValue = $baseValue * 1.05;
        }
        if ($this->radio) {
            $baseValue = $baseValue * 1.075;
        }
        if ($this->climatronic) {
            $baseValue = $baseValue * 1.10;
        }
        return $baseValue;
    }
    public function __toString() {
        $baseString = parent::__toString();
        $alarmStatus = $this->alarm ? "Yes" : "No";
        $radioStatus = $this->radio ? "Yes" : "No";
        $climatronicStatus = $this->climatronic ? "Yes" : "No";
        return "{$baseString}, Alarm: {$alarmStatus}, Radio: {$radioStatus}, Climatronic: {$climatronicStatus}";
    }
}
?>
