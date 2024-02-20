<!DOCTYPE html>
<html>
<?php

		$conn = new mysqli("localhost","root","","csurv");
		//connection established

		if($conn === false){
			die("ERROR: Could not connect. " 
				. mysqli_connect_error());
		}
		//Inserting values into specified columns
		$answer = $_POST['answer'];
		$agegroup = $_POST['agegroup'];
		$vaccines = $_POST['vaccines'];
		//This is to insert multiple textbox values into 1 column 
		$checkbox1 = $_POST['inp'];
		$chk ="";
		foreach($checkbox1 as $chk1){
			$chk .= $chk1." ";
		}
		$checkbox2 = $_POST['inps'];
		$chks ="";
		foreach($checkbox2 as $chks1){
			$chks .= $chks1." ";
		}
		$sql = "INSERT INTO submisiion (qualified, agegroup, vaccinetype, physsymptoms, illsymptoms)
				VALUES('$answer','$agegroup','$vaccines','$chk','$chks')";

		//This is for submiting new surveys
		 if(mysqli_query($conn, $sql)){
		     echo "<h3>CONGRATULATIONS</h3>"; 

		// } else{
		//     echo "ERROR: Hush! Sorry $sql. " 
		//         . mysqli_error($conn);
		 }

		//me outputting data the table
		echo "\nHere are your submitted answers:\n";
		echo nl2br("\n$answer\n $agegroup\n "
		         . "$vaccines\n $chk\n $chks\n");
		$data = "SELECT vaccinetype FROM submisiion WHERE agegroup = '20-49'";
		$result = $conn->query($data);

		// if ($result->num_rows > 0) 
		// {
		// 	echo "<table><tr><th>Vaccines</th></tr>";
		// 	// output data of each row
		// 	while($row = $result->fetch_assoc()) {
		// 	echo "<tr><td>".$row["vaccinetype"]."</td></tr>";
		// 	}
		// 	echo "</table>";
		// } else {
		// 	echo "0 results";
		// }
		//returns the number of vaccines from vaccinetype grouped 
		$query = "SELECT vaccinetype, COUNT(*) AS number FROM submisiion GROUP BY vaccinetype";
		$nresult = mysqli_query($conn, $query);

		$juery = "SELECT agegroup, COUNT(*) AS gunmber FROM submisiion GROUP BY agegroup";
		$gresult = mysqli_query($conn, $juery);

		$suery = "SELECT physsymptoms, COUNT(*) AS sunmber FROM submisiion GROUP BY physsymptoms";
		$sresult = mysqli_query($conn,$suery);

		// Close connection
		mysqli_close($conn);

?>

   <head>
	<title>You're Covid Vaccine Experience Continued</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		google.charts.setOnLoadCallback(crawChart);
		google.charts.setOnLoadCallback(srawChart);
		function drawChart()
		{	//function for first pie chart
			var data = google.visualization.arrayToDataTable([
				['Vaccine', 'Number'],
				<?php
				while($row= $nresult->fetch_assoc()){
					echo "['".$row["vaccinetype"]."', ".$row["number"]."],";
				}
				?>
			]);
			var options = {
				title: 'Percentage of Vaccines'
			};
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));

			chart.draw(data, options);
		}

		function crawChart()
		{	//function for age group pie chart
			var agedata = google.visualization.arrayToDataTable([
				['Agegroups', 'Gunmber'],
				<?php
				while($row= $gresult->fetch_assoc()){
					echo "['".$row["agegroup"]."', ".$row["gunmber"]."],";
				}
				?>
			]);
			var ageoptions = {
				title: 'Percentage of Age Groups'
			};
			var agechart = new google.visualization.PieChart(document.getElementById('agechart'));

			agechart.draw(agedata, ageoptions);
		}

		function srawChart()
		{	//function for physical symptoms pie chart
			var symdata = google.visualization.arrayToDataTable([
				['Symptoms', 'Sunmber'],
				<?php
				while($row= $sresult->fetch_assoc()){
					echo "['".$row["physsymptoms"]."', ".$row["sunmber"]."],";
				}
				?>
			]);
			var symoptions = {
				title: 'Percentage of PhysSymptoms Groups'
			};
			var symchart = new google.visualization.PieChart(document.getElementById('symchart'));

			symchart.draw(symdata, symoptions);
		}
	</script>
	<style>
	  /* Style for the Background of the webpage */
	  body {
		background-color: #9a1bcc;
		font-family: Arial;
		text-align: center;
	  }
	</style>
  </head>

	<body>
		<h1>Covid Vaccine Experience Survey Results</h1>
		<div id="piechart" style="width: 500px; height: 500px;">
		</div>
		<div id="agechart" style="width: 500px; height: 500px;">
		</div>
		<div id="symchart" style="width: 500px; height: 500px;">
		</div>
		
			<p><a href = "http://localhost/cov_surv.php" target="_blank">Retake the Survey</a></p>
		
	</body>
</html>
	