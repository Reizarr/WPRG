<!DOCTYPE html>
<html>
<body>
<?php
class Car {
    public static $count = 0;
    private $model;
    private $price;
    private $exchangeRate;
    public function __construct($model, $price, $exchangeRate) {
        $this->model = $model;
        $this->price = $price;
        $this->exchangeRate = $exchangeRate;
        self::$count++;
    }
    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function getExchangeRate() {
        return $this->exchangeRate;
    }
    public function setExchangeRate($exchangeRate) {
        $this->exchangeRate = $exchangeRate;
    }
    public function value() {
        return $this->price * $this->exchangeRate;
    }
    public function __toString() {
        return "Model: {$this->model}, Price: {$this->price}  EURO, Exchange Rate: {$this->exchangeRate} PLN";
    }
}
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
class InsuranceCar extends NewCar {
    private $firstOwner;
    private $years;
    public function __construct($model, $price, $exchangeRate, $alarm, $radio, $climatronic, $firstOwner, $years) {
        parent::__construct($model, $price, $exchangeRate, $alarm, $radio, $climatronic);
        $this->firstOwner = $firstOwner;
        $this->years = $years;
    }
    public function getFirstOwner() {
        return $this->firstOwner;
    }
    public function setFirstOwner($firstOwner) {
        $this->firstOwner = $firstOwner;
    }
    public function getYears() {
        return $this->years;
    }
    public function setYears($years) {
        $this->years = $years;
    }
    public function value() {
        $baseValue = parent::value();
        $discount = ($this->years * 0.01) + ($this->firstOwner ? 0.05 : 0);
        $baseValue = $baseValue * (1 - $discount);
        return $baseValue;
    }
    public function __toString() {
        $baseString = parent::__toString();
        $firstOwnerStatus = $this->firstOwner ? "Yes" : "No";
        return "{$baseString}, First Owner: {$firstOwnerStatus}, Years: {$this->years}";

    }
}
$car1 = new Car("Model S", 50000, 4.5);
echo $car1 . "<br>";
$newCar1 = new NewCar("Model X", 60000, 4.5, true, true, true);
echo $newCar1 . "<br>";
$insuranceCar1 = new InsuranceCar("Model Z", 85000, 4.5, false, true, true, true, 3);
echo $insuranceCar1 . "<br>";
?>
</body>
</html>