<?php
class project implements JsonSerializable{
    // Properties
    private string $name;
    private array $images;
    private string $year;
    private string $client;
    private string $startDate;
    private string $endDate;
    public function __construct($name, $images, $year,$client,$startDate,$endDate)
    {
        $this->name = $name;
        $this->images = $images;
        $this->year = $year;
        $this->client = $client;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?><?php
