 <?php
include_once(PATH_ROOT . "/admin/models/busroute_Model.php");
include_once(PATH_ROOT . "/admin/models/busstop_Model.php");
class busroute_Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new BusRoute_Model();
    }
    public function indexAction()
    {
        echo "Busstop page <br>";
        echo "Any debug post here !";
    }
    public function getAction()
    {
        $arrayBusRoute = $this->model->get();
        require(PATH_APPLICATION . "/views/getBusRoute.php");
    }
    public function insertAction()
    {
        $modelBusRoute=new BusRoute_Model();
        $modelBusStop=new BusStop_Model();
        $arrayBusStop=$modelBusStop->get();
        require_once(PATH_APPLICATION . "/views/addBusRoute.php");
        if (isset($_POST['Add']))
        {
            $busroute_id=$_POST['id'];
            $busroute_name=$_POST['name'];
            $busroute_start=$_POST['start'];
            $busroute_final=$_POST['final'];
            if(!isset($_POST['hours_start'])||!isset($_POST['minute_start']))
                $busroute_starttime='00:00:00';
            else
                $busroute_starttime=$_POST['hours_start'].":".$_POST['minute_start'].":00";
            if(!isset($_POST['hours_final'])||!isset($_POST['minute_final']))
                $busroute_finaltime='00:00:00';
            else
                $busroute_finaltime=$_POST['hours_final'].":".$_POST['minute_final'].":00";
            if(!($busroute_name==""||$busroute_id==""||!is_numeric($busroute_id)||$busroute_start==""||$busroute_final==""))
            {
                $busroute_Entity = new BusRoute_Entity ($busroute_id, $busroute_name, $busroute_start, $busroute_final, $busroute_starttime, $busroute_finaltime);
                $result = $this->model->insert($busroute_Entity);
                echo $result;
                if ($result)
                {
                    if(isset($_POST['point']))
                    {
                        $listBusStop=$_POST['point'];
                        $result=$this->model->setBusStop($listBusStop,$busroute_id);
                    }
                    //header("Location: admin.php?c=busstop&a=get");
                    echo("<script>location.href ='/admin.php?c=busroute&a=get';</script>");
                }
                else
                    {
                        echo 
                        "<script>
                            myFunction();
                            function myFunction() {
                                alert('Đã tồn tại tuyến xe, mời nhập lại');
                            }
                        </script>";
                    }
            }
        }
    }
    public function editAction()
    {
        $id=$_GET['id'];
        $busroute_select=$this->model->getById($id);
        $modelBusStop=new BusStop_Model();
        $arrayBusStop=$modelBusStop->get();
        $arraySelectBusStop=$this->model->getBusStop($id);
        require_once(PATH_APPLICATION . "/views/editBusRoute.php");
        if (isset($_POST['Edit'])) 
        {
            $busroute_name=$_POST['name'];
            $busroute_start=$_POST['start'];
            $busroute_final=$_POST['final'];
            if(!isset($_POST['hours_start'])||!isset($_POST['minute_start']))
                $busroute_starttime='00:00:00';
            else
                $busroute_starttime=$_POST['hours_start'].":".$_POST['minute_start'].":00";
            if(!isset($_POST['hours_final'])||!isset($_POST['minute_final']))
                $busroute_finaltime='00:00:00';
            else
                $busroute_finaltime=$_POST['hours_final'].":".$_POST['minute_final'].":00";
            if(!($busroute_name==""||$busroute_start==""||$busroute_final==""))
            {
                $busroute_Entity = new BusRoute_Entity ($id, $busroute_name, $busroute_start, $busroute_final, $busroute_starttime, $busroute_finaltime);
                $result = $this->model->edit($busroute_Entity);
                echo $result;
                if ($result)
                {
                    $this->model->deleteBusStop($id);
                    $listBusStop=$_POST['point'];
                    $result=$this->model->setBusStop($listBusStop,$id);
                    //header("Location: admin.php?c=busstop&a=get");
                    echo("<script>location.href ='/admin.php?c=busroute&a=get';</script>");
                }
            }
        }
    }
    public function deleteAction()
    {
        $id=$_GET['id'];
        $result1 = $this->model->delete($id);
        $result2 = $this->model->deleteBusStop($id);
        if ($result1&&$result2)
        {
            echo("<script>location.href ='/admin.php?c=busroute&a=get';</script>");
        }
    }
    public function detailAction()
    {
        $id=$_GET['id'];
        $busroute_select=$this->model->getById($id);
        $arraySelectBusStop=$this->model->getBusStop($id);
        require_once(PATH_APPLICATION . "/views/detailBusRoute.php");
    }
}

?>