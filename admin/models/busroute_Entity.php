<?php
class BusRoute_Entity
{
    public $busroute_id;
    public $busroute_name;
    public $busroute_start;
    public $busroute_final;
    public $busroute_starttime;
    public $busroute_finaltime;
    public function __construct($busroute_id, $busroute_name, $busroute_start, $busroute_final, $busroute_starttime, $busroute_finaltime)
    {
        $this->busroute_id=$busroute_id;
        $this->busroute_name=$busroute_name;
        $this->busroute_start=$busroute_start;
        $this->busroute_final=$busroute_final;
        $this->busroute_starttime=$busroute_starttime;
        $this->busroute_finaltime=$busroute_finaltime;
    }
}
?>