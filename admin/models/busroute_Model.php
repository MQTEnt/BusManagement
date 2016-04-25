<?php
include_once(PATH_ROOT . "/admin/models/busroute_Entity.php");

class BusRoute_Model
{
    public function get()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "SELECT * FROM route_example";
        $result = mysqli_query($conn, $query);
        $arrayBusRoute = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $busroute = new BusRoute_Entity(
                $row['id'], $row['name'], $row['start'], $row['final'],
                $row['start_time'], $row['final_time']);
            array_push($arrayBusRoute, $busroute);
        }
        return $arrayBusRoute;
    }
    public function insert(BusRoute_Entity $busroute_Entity)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "INSERT INTO route_example
        VALUES ('$busroute_Entity->busroute_id',
                '$busroute_Entity->busroute_name',
                '$busroute_Entity->busroute_start',
                '$busroute_Entity->busroute_final',
                '$busroute_Entity->busroute_starttime',
                '$busroute_Entity->busroute_finaltime')";
        $result = mysqli_query($conn, $query);
        if($result){
            return 1;
        } else
            return 0;
    }
    public function setBusStop($listBusStop, $route)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        foreach ($listBusStop as $busstop)
        {
            $query = "INSERT INTO route_detail VALUES ($busstop,$route)";
            $result = mysqli_query($conn, $query);
            if(!$result)
                break;
        }
        return $result;
    }
    public function getBusStop($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "SELECT id, name FROM poi_example AS P
                JOIN (SELECT point_id FROM route_detail WHERE route_id =$id)
                AS D ON ( P.id = D.point_id )";
        $result = mysqli_query($conn, $query);
        $arrayBusStop = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $busstop = array('id'=>$row['id'],'name'=>$row['name']);
            array_push($arrayBusStop, $busstop);
        }
        return $arrayBusStop;   
    }
    public function deleteBusStop($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query="DELETE FROM route_detail WHERE route_id=".$id;
        $result =mysqli_query($conn, $query);
        return $result;
    }
    public function edit(BusRoute_Entity $busroute_Entity)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "UPDATE route_example SET    name='$busroute_Entity->busroute_name',
                                            start='$busroute_Entity->busroute_start',
                                            final='$busroute_Entity->busroute_final',
                                            start_time='$busroute_Entity->busroute_starttime',
                                            final_time='$busroute_Entity->busroute_finaltime'
                                            WHERE id=".$busroute_Entity->busroute_id;
        $result=mysqli_query($conn, $query);
        if($result){
            return 1;
        }
        else
            return 0;
    }
    public function delete($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query="DELETE FROM route_example WHERE id=".$id;
        $result =mysqli_query($conn, $query);
        return $result;
    }
    public function getById($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $sql = "SELECT * FROM route_example WHERE id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($query);
        $busroute=new BusRoute_Entity($data['id'],$data['name'],$data['start'],$data['final'],$data['start_time'],$data['final_time']);
        return $busroute;
    }
}

?>