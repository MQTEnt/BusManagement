<?php
include_once(PATH_ROOT . "/admin/models/busstop_Entity.php");

class BusStop_Model
{
    public function get()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "SELECT * FROM poi_example";
        $result = mysqli_query($conn, $query);
        $arrayBusStop = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $busstop = new BusStop_Entity(
                $row['id'], $row['name'], $row['des'], $row['lat'],
                $row['lon']);
            array_push($arrayBusStop, $busstop);
        }
        return $arrayBusStop;
    }
    public function insert(BusStop_Entity $busstop_Entity)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "INSERT INTO poi_example
        VALUES ('$busstop_Entity->busstop_id',
                '$busstop_Entity->busstop_name',
                '$busstop_Entity->busstop_desc',
                $busstop_Entity->busstop_lat,
                $busstop_Entity->busstop_lon)";
        $result = mysqli_query($conn, $query);
        if($result){
            return 1;
        } else
            return 0;
    }
    public function edit(BusStop_Entity $busstop_Entity)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "UPDATE poi_example SET    name='$busstop_Entity->busstop_name',
                                            des='$busstop_Entity->busstop_desc',
                                            lat=$busstop_Entity->busstop_lat,
                                            lon=$busstop_Entity->busstop_lon
                                            WHERE id=".$busstop_Entity->busstop_id;
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
        $query="DELETE FROM poi_example WHERE id=".$id;
        $result =mysqli_query($conn, $query);
        if($result){
            return 1;
        }
        else
            return 0;
    }
    public function getById($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $sql = "SELECT * FROM poi_example WHERE id='".$id."'";
        $query=mysqli_query($conn,$sql);
        $data=mysqli_fetch_assoc($query);
        $busstop=new BusStop_Entity($data['id'],$data['name'],$data['des'],$data['lat'],$data['lon']);
        return $busstop;
    }
    public function getBusRoute($id)
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($conn,"SET NAMES 'utf8'");
        $query = "SELECT route_id FROM route_detail WHERE point_id='".$id."'";
        $result = mysqli_query($conn, $query);
        $str="";
        while ($row = mysqli_fetch_assoc($result))
        {
            $str=$str.$row['route_id'].' ';
        }
        return $str;
    }
}

?>