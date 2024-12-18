
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/css.css">

</head>
<body>

	<input type="checkbox" id="checkbox">
	<div class="body">
		<section class="section-1">
				<div class="dashboard">
					<div class="dashboard-item">
						<i class="fa fa-users"></i>
						<span>Employee</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-tasks"></i>
						<span> All Tasks</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-window-close-o"></i>
						<span> Overdue</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-clock-o"></i>
						<span> No Deadline</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-exclamation-triangle"></i>
						<span> Due Today</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-bell"></i>
						<span> Notifications</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-square-o"></i>
						<span> Pending</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-spinner"></i>
						<span> In progress</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-check-square-o"></i>
						<span> Completed</span>
					</div>
				</div>
                

                <!-- client -->


				<div class="dashboard">
					<div class="dashboard-item">
						<i class="fa fa-tasks"></i>
						<span> My Tasks</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-window-close-o"></i>
						<span> Overdue</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-clock-o"></i>
						<span> No Deadline</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-square-o"></i>
						<span> Pending</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-spinner"></i>
						<span> In progress</span>
					</div>
					<div class="dashboard-item">
						<i class="fa fa-check-square-o"></i>
						<span> Completed</span>
					</div>
				</div>
		</section>
	</div>

<script type="text/javascript">
	var active = document.querySelector("#navList li:nth-child(1)");
	active.classList.add("active");
</script>
</body>
</html>
