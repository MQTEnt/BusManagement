<?php
class BusStop_Entity
{
    public $busstop_id;
    public $busstop_name;
    public $busstop_desc;
    public $busstop_lon;
    public $busstop_lat;
    public function __construct($busstop_id, $busstop_name, $busstop_desc, $busstop_lat, $busstop_lon)
    {
        $this->busstop_id = $busstop_id;
        $this->busstop_name = $busstop_name;
        $this->busstop_desc = $busstop_desc;
        $this->busstop_lon = $busstop_lon;
        $this->busstop_lat = $busstop_lat;
    }
    public function getBusStopId()
    {
        return $this->busstop_id;
    }
    public function setBusStopId($busstop_id)
    {
        $this->busstop_id = $busstop_id;
    }
    public function getBusStopName()
    {
        return $this->busstop_name;
    }
    public function setBusStopName($busstop_name)
    {
        $this->busstop_name = $busstop_name;
    }
    public function getBusStopDesc()
    {
        return $this->busstop_desc;
    }
    public function setBusStopDesc($busstop_desc)
    {
        $this->busstop_desc = $busstop_desc;
    }
    public function getBusStopLat()
    {
        return $this->busstop_lat;
    }
    public function setBusStopLat($busstop_lat)
    {
        $this->busstop_lat = $busstop_lat;
    }
    public function getBusStopLon()
    {
        return $this->busstop_lon;
    }
    public function setBusStopLon($busstop_lon)
    {
        $this->busstop_lon = $busstop_lon;
    }
}
?>