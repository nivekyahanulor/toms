  <?php
	
		//**  GOODS **//
		$brgy_id    = $_POST['brgyid'];
		$greport	= $mysqli->query("
			SELECT 
			SUM(IF(month = 'Jan', total, 0)) AS 'Jan', 
			SUM(IF(month = 'Feb', total, 0)) AS 'Feb', 
			SUM(IF(month = 'Mar', total, 0)) AS 'Mar', 
			SUM(IF(month = 'Apr', total, 0)) AS 'Apr', 
			SUM(IF(month = 'May', total, 0)) AS 'May', 
			SUM(IF(month = 'Jun', total, 0)) AS 'Jun', 
			SUM(IF(month = 'Jul', total, 0)) AS 'Jul', 
			SUM(IF(month = 'Aug', total, 0)) AS 'Aug', 
			SUM(IF(month = 'Sep', total, 0)) AS 'Sep', 
			SUM(IF(month = 'Oct', total, 0)) AS 'Oct', 
			SUM(IF(month = 'Nov', total, 0)) AS 'Nov', 
			SUM(IF(month = 'Dec', total, 0)) AS 'Dec' 
			FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, 
			COUNT(*) as total 
			FROM sk_procurement WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and brgy_id='$brgy_id'
			GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub 
		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month[] =  $val;
					$value[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'TRANSACTION REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month);?>
    },
    yAxis: {
        title: {
            text: ' TRANSACTION'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'TRANSACTION',
		color: '#0066FF',
        data: <?php echo json_encode($value,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	
		//**  BUDGETS **//
		$brgy_id    = $_POST['brgyid'];
		$greport	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, SUM(amount) as total FROM sk_budget_record WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and isExpenses = 0 and brgyID='$brgy_id' GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub

		");
		$row1    = $greport->fetch_assoc();
			foreach($row1 as $val => $res){
					$month1[] =  $val;
					$value1[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-1', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'BUDGET REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month1);?>
    },
    yAxis: {
        title: {
            text: 'AMOUNT'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'BUDGET',
		color: '#008000',
        data: <?php echo json_encode($value1,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	
		//**  EXPENSES **//
		$brgy_id    = $_POST['brgyid'];
		$greport1	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, SUM(amount) as total FROM sk_budget_record WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and isExpenses = 1 and brgyID='$brgy_id' GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub

		");
		$row2    = $greport1->fetch_assoc();
			foreach($row2 as $val => $res){
					$month12[] =  $val;
					$value12[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-2', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'EXPENSES REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month12);?>
    },
    yAxis: {
        title: {
            text: 'AMOUNT'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'EXPENSES',
		color: '#FF0000',
        data: <?php echo json_encode($value12,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	
		//**  TRUST FUND **//
		$brgy_id    = $_POST['brgyid'];
		$greport2	= $mysqli->query("
			SELECT SUM(IF(month = 'Jan', total, 0)) AS 'Jan', SUM(IF(month = 'Feb', total, 0)) AS 'Feb', SUM(IF(month = 'Mar', total, 0)) AS 'Mar', SUM(IF(month = 'Apr', total, 0)) AS 'Apr', SUM(IF(month = 'May', total, 0)) AS 'May', SUM(IF(month = 'Jun', total, 0)) AS 'Jun', SUM(IF(month = 'Jul', total, 0)) AS 'Jul', SUM(IF(month = 'Aug', total, 0)) AS 'Aug', SUM(IF(month = 'Sep', total, 0)) AS 'Sep', SUM(IF(month = 'Oct', total, 0)) AS 'Oct', SUM(IF(month = 'Nov', total, 0)) AS 'Nov', SUM(IF(month = 'Dec', total, 0)) AS 'Dec' FROM ( SELECT DATE_FORMAT(date_added, '%b') AS month, SUM(amount) as total FROM sk_budget_record WHERE date_added <= NOW() and date_added >= Date_add(Now(),interval - 12 month) and isExpenses = 2 and brgyID='$brgy_id' GROUP BY DATE_FORMAT(date_added, '%m-%Y')) as sub

		");
		$row2    = $greport2->fetch_assoc();
			foreach($row2 as $val => $res){
					$month121[] =  $val;
					$value121[] =  $res;
			}
			
?>
<script>
Highcharts.chart('container-3', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'TRUST FUND REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($month121);?>
    },
    yAxis: {
        title: {
            text: 'AMOUNT'
        },
        labels: {
            formatter: function () {
				return Highcharts.numberFormat(this.value,0);
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
   
    series: [{
        name: 'TRUST FUND',
		color: '#FFA500',
        data: <?php echo json_encode($value121,JSON_NUMERIC_CHECK);?>

    }]
});
</script>