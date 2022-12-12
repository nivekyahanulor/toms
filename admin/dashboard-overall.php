<?php
	$overall1  = $mysqli->query("select a.barangay_name, count(b.title)count from skaccount a LEFT JOIN sk_procurement b on a.brgyID = b.brgy_id group by a.barangay_name order by a.brgyID asc");
	 while($valov1 = $overall1->fetch_object()){ 
		 $monthov1[]   =  $valov1->barangay_name;
		 $valueov1[]   =  $valov1->count;
	}
?>
<script>
Highcharts.chart('overall-1', {
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
        categories: <?php echo json_encode($monthov1);?>
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
        data: <?php echo json_encode($valueov1,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
<?php
	$overall2  = $mysqli->query("	select a.barangay_name, sum(b.amount)count 
									from skaccount a LEFT 
									JOIN sk_budget_record b on a.brgyID = b.brgyID
									and b.isExpenses = '0'
									group by a.barangay_name order by a.brgyID asc
								");
	 while($valov2 = $overall2->fetch_object()){ 
		 $monthov2[]   =  $valov2->barangay_name;
		 $valueov2[]   =  $valov2->count;
	}
?>
<script>
Highcharts.chart('overall-2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'BUDGET REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($monthov2);?>
    },
    yAxis: {
        title: {
            text: ' BUDGET'
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
		color: '#0066FF',
        data: <?php echo json_encode($valueov2,JSON_NUMERIC_CHECK);?>

    }]
});
</script>

<?php
	$overall3  = $mysqli->query("	select a.barangay_name, sum(b.amount)count 
									from skaccount a LEFT 
									JOIN sk_budget_record b on a.brgyID = b.brgyID
									and b.isExpenses = '1'
									group by a.barangay_name order by a.brgyID asc
								");
	 while($valov3 = $overall3->fetch_object()){ 
		 $monthov3[]   =  $valov3->barangay_name;
		 $valueov3[]   =  $valov3->count;
	}
?>
<script>
Highcharts.chart('overall-3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'EXPENSES REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($monthov3);?>
    },
    yAxis: {
        title: {
            text: ' EXPENSES'
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
		color: '#0066FF',
        data: <?php echo json_encode($valueov3,JSON_NUMERIC_CHECK);?>

    }]
});
</script>


<?php
	$overall4  = $mysqli->query("	select a.barangay_name, sum(b.amount)count 
									from skaccount a LEFT 
									JOIN sk_budget_record b on a.brgyID = b.brgyID
									and b.isExpenses = '2'
									group by a.barangay_name order by a.brgyID asc
								");
	 while($valov4 = $overall4->fetch_object()){ 
		 $monthov4[]   =  $valov4->barangay_name;
		 $valueov4[]   =  $valov4->count;
	}
?>
<script>
Highcharts.chart('overall-4', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'TRUST FUND REPORTS ' + <?php echo date('Y');?>
    },
    subtitle: {
        text: 'Source: toms database'
    },
    xAxis: {
        categories: <?php echo json_encode($monthov4);?>
    },
    yAxis: {
        title: {
            text: ' TRUST FUND'
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
		color: '#0066FF',
        data: <?php echo json_encode($valueov4,JSON_NUMERIC_CHECK);?>

    }]
});
</script>
