<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- or -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/881d143453.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <!-- Font-icon css-->
  <style>
    

  </style>
</head>
<div class="container-fluid w-100 text-white">
  <div class="row m-auto pt-5 ms-1 ">
    <div class="col-lg-3 col-md-6 col-sm-12 position-relative  border  rounded bg-success">
      <div class="row ">
        <div class="logoLeft "><i class=" border border-4 rounded-circle p-3 fa-solid fa-user fa-2x m-2"></i></div>
        <div class="info1">
          <h6 style="width:100%">Người dùng</h6>
          <p><b><?=sizeof($data['listAllKh']) ?>  khách hàng</b></p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12  border rounded bg-danger">
    <div class="row w-100 logobox">
        <div class="logoLeft"><i class="border border-4  rounded-circle p-3 fa-solid fa-burger fa-2x m-2"></i></div>
        <div class="info2 ">
          <h6>Sản phẩm</h6>
          <p><b><?=sizeof($data['listAllSp']) ?> sản phẩm</b></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12  border rounded bg-primary">
    <div class="row w-100 logobox">
      <div class="logoLeft "><i class="border border-4 rounded-circle p-3 fa-solid fa-comment fa-2x m-2"></i></div>
      <div class="info3 ">
        <h6>Bình luận</h6>
        <p><b><?=sizeof($data['listAllBl']) ?>  bình luận</b></p>
      </div> 
      </div> 
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12  border rounded bg-info">
      <div class="row w-100 logobox">
        <div class="logoLeft ">
          <i class="border border-4 rounded-circle p-3 fa-solid fa-pen-nib fa-2x m-2 "></i>
        </div>  
        <div class="info4 ">
          <h6>Bài viết</h6>
          <p><b><?=sizeof($data['listAllNews']) ?> bài viết</b></p>
        </div>
        </div> 
      </div>
  </div>
</div>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container-fluid w-100 row mt-5 ms-1">
    <div class="col-lg-6 col-md-12 col-sm-12 shadow">
      <div id="myChart" style=" max-width:800px; height:600px;"></div>
    </div>  
    <div class="col-lg-6 col-md-12 col-sm-12 container shadow text-center p-3">
      <canvas class="" id="myChart1" style="width:100%;max-width:600px;height:400px;"></canvas>

   
    
</div>

<?php 
  debug($data['tkdh']);
  for($i=1;$i<13;$i++){
    if(isset($data['tkdh'][($i-1)]['thang'])){
      for($j = 1; $j <13;$j++){
        if(!isset($yValues[$j])) $yValues[$j]="";
        if($j == $data['tkdh'][($i-1)]['thang']){
           $yValues[$j] = $data['tkdh'][($i-1)]['tong'];
        }elseif($yValues[$j]==""){
          $yValues[$j]=0;
        }
      }
    }
    $xValuesx = $i;
  }
  debug($yValues);
?>
<script>
var yValues = [0,0,0,0,0,0,0,0,0,0,0,0];

var xValues = [1,2,3,4,5,6,7,8,9,10,11,12];



new Chart("myChart1", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 1, max:30000000}}],
    }
  }
  
});
</script>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Danh Mục', 'Số Lượng Sản Phẩm'],
    <?php 
    $tongloai = count($data['tk']);
    $i=1;
    foreach($data['tk'] as $kq){         
        if($i == $tongloai) $dau=""; else $dau=",";
        echo "['".$kq['tenLoai']."',".$kq['countsp']."],";
        $i++;
    }
    ?>
]);

var options = {
  title:'Biểu đồ thông kê theo loại',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>