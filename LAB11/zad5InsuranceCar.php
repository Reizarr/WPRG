<?php
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
?>