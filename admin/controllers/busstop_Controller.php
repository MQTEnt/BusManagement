 <?php
include_once(PATH_ROOT . "/admin/models/busstop_Model.php");
class busstop_Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new BusStop_Model();
    }
    public function indexAction()
    {
        echo "Busstop page <br>";
        echo "Any debug post here !";
    }
    public function getAction()
    {
        $arrayBusStop = $this->model->get();
        $arrayBusRoute = array();
        foreach ($arrayBusStop as $busstop)
        {
            $arrayBusRoute[$busstop->busstop_id]=$this->model->getBusRoute($busstop->busstop_id);
        }
        require(PATH_APPLICATION . "/views/getBusStop.php");
    }
    public function insertAction()
    {
        $modelBusStop=new BusStop_Model();
        require_once(PATH_APPLICATION . "/views/addBusStop.php");
        if (isset($_POST['Add']))
        {
            $busstop_id="";
            $busstop_name=$_POST['name'];
            $busstop_desc=$_POST['desc'];
            $busstop_lat=$_POST['lati'];
            $busstop_lon=$_POST['long'];
            if(!($busstop_name==""||$busstop_desc==""||$busstop_lat==""))
            {
                $busstop_Entity = new BusStop_Entity ($busstop_id, $busstop_name, $busstop_desc, $busstop_lat, $busstop_lon);
                $result = $this->model->insert($busstop_Entity);
                if ($result)
                {
                    //header("Location: admin.php?c=busstop&a=get");
                    echo("<script>location.href ='/admin.php?c=busstop&a=get';</script>");
                }
            }
        }
    }
    public function editAction()
    {
        $id=$_GET['id'];
        $busstop_select=$this->model->getById($id);
        require_once(PATH_APPLICATION . "/views/editBusStop.php");
        if (isset($_POST['Edit'])) 
        {
            $busstop_name=$_POST['name'];
            $busstop_desc=$_POST['desc'];
            $busstop_lat=$_POST['lati'];
            $busstop_lon=$_POST['long'];
            $busstop_Entity = new BusStop_Entity($id,$busstop_name,$busstop_desc,$busstop_lat,$busstop_lon);
            if(!($busstop_name==""||$busstop_desc==""||$busstop_lat==""))
            {
                $result = $this->model->edit($busstop_Entity);
                if ($result)
                {
                    echo("<script>location.href ='/admin.php?c=busstop&a=get';</script>");
                }
            }
        }
    }
    public function deleteAction()
    {
        $id=$_GET['id'];
        $result = $this->model->delete($id);
        if ($result)
        {
            echo("<script>location.href ='/admin.php?c=busstop&a=get';</script>");
        }
    }
    public function detailAction()
    {
        $id=$_GET['id'];
        $busstop_select = $this->model->getById($id);
        $arrayBusRoute = $this->model->getBusRoute($id);
        require(PATH_APPLICATION . "/views/detailBusStop.php");
    }
}

?>