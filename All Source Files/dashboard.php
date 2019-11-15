<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
	
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "SENSEX",
      "proName": "BSE:SENSEX"
    },
    {
      "description": "Yes Bank",
      "proName": "BSE:YESBANK"
    },
    {
      "description": "Reliance",
      "proName": "BSE:RELIANCE"
    },
    {
      "description": "Federal Bank",
      "proName": "BSE:FEDERALBNK"
    },
    {
      "description": "SBI",
      "proName": "BSE:SBIN"
    },
    {
      "description": "Bank Of Baroda",
      "proName": "BSE:BANKBARODA"
    },
    {
      "description": "Indiabulls Housing Finance",
      "proName": "BSE:IBULHSGFIN"
    },
    {
      "description": "ITC",
      "proName": "BSE:ITC"
    },
    {
      "description": "ICICI",
      "proName": "BSE:ICICIBANK"
    },
    {
      "description": "HDFC Bank",
      "proName": "BSE:HDFCBANK"
    },
    {
      "description": "Britannia",
      "proName": "BSE:BRITANNIA"
    },
    {
      "description": "Larsen & Turbo Ltd",
      "proName": "BSE:LT"
    },
    {
      "description": "Indigo",
      "proName": "BSE:INDIGO"
    },
    {
      "description": "Ashok Leyland",
      "proName": "BSE:ASHOKLEY"
    },
    {
      "description": "Wipro",
      "proName": "BSE:WIPRO"
    },
    {
      "description": "Tata Steel",
      "proName": "BSE:TATASTEEL"
    },
    {
      "description": "Hindustan Unilever Ltd",
      "proName": "BSE:HINDUNILVR"
    },
    {
      "description": "Titan",
      "proName": "BSE:TITAN"
    },
    {
      "description": "BPCL",
      "proName": "BSE:BPCL"
    },
    {
      "description": "Bajaj Finance Ltd",
      "proName": "BSE:BAJFINANCE"
    },
    {
      "description": "Spicejet",
      "proName": "BSE:SPICEJET"
    },
    {
      "description": "Bank Of India",
      "proName": "BSE:BANKINDIA"
    },
    {
      "description": "TCS",
      "proName": "BSE:TCS"
    },
    {
      "description": "IDEA",
      "proName": "BSE:IDEA"
    },
    {
      "description": "Axis",
      "proName": "BSE:AXISBANK"
    }
  ],
  "colorTheme": "dark",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "in"
}
  </script>
</div>
<!-- TradingView Widget END -->


	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-md-3">
				
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
<?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 

						<h4>Today's Expense</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent"><?php if($sum_today_expense==""){
echo "0";
} else {
echo $sum_today_expense;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yestreday Expense
$userid=$_SESSION['detsuid'];
$ydate=date('Y-m-d',strtotime("-1 days"));
$query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
$result1=mysqli_fetch_array($query1);
$sum_yesterday_expense=$result1['yesterdayexpense'];
 ?> 
					<div class="panel-body easypiechart-panel">
						<h4>Yesterday's Expense</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent"><?php if($sum_yesterday_expense==""){
echo "0";
} else {
echo $sum_yesterday_expense;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Weekly Expense
$userid=$_SESSION['detsuid'];
 $pastdate=  date("Y-m-d", strtotime("-1 week")); 
$crrntdte=date("Y-m-d");
$query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
$result2=mysqli_fetch_array($query2);
$sum_weekly_expense=$result2['weeklyexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Last 7day's Expense</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>"><span class="percent"><?php if($sum_weekly_expense==""){
echo "0";
} else {
echo $sum_weekly_expense;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Monthly Expense
$userid=$_SESSION['detsuid'];
 $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$crrntdte=date("Y-m-d");
$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
$result3=mysqli_fetch_array($query3);
$sum_monthly_expense=$result3['monthlyexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Last 30day's Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent"><?php if($sum_monthly_expense==""){
echo "0";
} else {
echo $sum_monthly_expense;
}

	?></span></div>
					</div>
				</div>
			</div>
		
		</div><!--/.row-->
			<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
 $cyear= date("Y");
$query4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
$result4=mysqli_fetch_array($query4);
$sum_yearly_expense=$result4['yearlyexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Current Year Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent"><?php if($sum_yearly_expense==""){
echo "0";
} else {
echo $sum_yearly_expense;
}

	?></span></div>


					</div>
				
				</div>

			</div>

		<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yearly Expense
$userid=$_SESSION['detsuid'];
$query5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
$result5=mysqli_fetch_array($query5);
$sum_total_expense=$result5['totalexpense'];
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Expenses</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense==""){
echo "0";
} else {
echo $sum_total_expense;
}

	?></span></div>


					</div>
				
				</div>

			</div>


		</div>

		<?php 
	$errors = "";
	$db = mysqli_connect("localhost", "root", "", "detsdb");
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks VALUES ('$userid','$task')";
			mysqli_query($db, $sql);
			header('location: dashboard.php');
		}
	}	
	
if (isset($_GET['del_task'])) {
	$tas = $_GET['del_task'];
	mysqli_query($db, "DELETE FROM tasks WHERE task='$tas'");
	header('location: dashboard.php');
}
?>

		<div class="heading">
				<h2 style="font-style: 'Hervetica';">To Do List</h2>
			</div>
			<form method="post" action="dashboard.php" class="input_form">
			<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
			<?php } ?>
				<input type="text" name="task" class="task_input">
				<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
			</form>
			
			<table>
	<thead>
		<tr>
			<th>Task No.</th>
			<th>Task Description</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM  tasks WHERE  uid='$userid'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="dashboard.php?del_task=<?php echo $row['task'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>	
		
	<!-- TradingView Widget BEGIN -->
<span class="tradingview-widget-container">
  <span class="tradingview-widget-container__widget"></span>
  <span class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/stocks-india/market-movers-gainers/" rel="noopener" target="_blank"><span class="blue-text"></span></a></span>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
  {
  "colorTheme": "dark",
  "dateRange": "12m",
  "exchange": "BSE",
  "showChart": true,
  "locale": "in",
  "largeChartUrl": "",
  "isTransparent": false,
  "width": "400",
  "height": "600",
  "plotLineColorGrowing": "rgba(25, 118, 210, 1)",
  "plotLineColorFalling": "rgba(25, 118, 210, 1)",
  "gridLineColor": "rgba(42, 46, 57, 1)",
  "scaleFontColor": "rgba(120, 123, 134, 1)",
  "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
  "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
  "symbolActiveColor": "rgba(33, 150, 243, 0.12)"
}
  </script>
</span>
<!-- TradingView Widget END -->	

<!-- TradingView Widget BEGIN -->
<span class="tradingview-widget-container" >
  <span class="tradingview-widget-container__widget"></span>
  <span class="tradingview-widget-copyright"><a href="https://in.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text"></span></a></span>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
  {
  "colorTheme": "dark",
  "isTransparent": false,
  "width": "510",
  "height": "600",
  "locale": "in",
  "importanceFilter": "-1,0,1",
  "currencyFilter": "INR"
}
  </script>
</span>
<!-- TradingView Widget END -->

	</div>
	<?php include_once('includes/footer.php');?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
<?php } ?>