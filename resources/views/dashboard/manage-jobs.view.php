<?php the_dashhead() ?>

<!-- Titlebar
================================================== -->

<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Start">
				<li><a href="<?php url('/main') ?>">Dashboard</a></li>
				<li><a href="#">Messages <span class="nav-tag">2</span></a></li>
			</ul>

			<ul data-submenu-title="Management">
				<li class="active-submenu"><a>For Employers</a>
					<ul>
						<li><a href="<?php url('/manage-jobs') ?>l">Manage Jobs <span class="nav-tag">5</span></a></li>
						<li><a href="<?php url('/manage-applications') ?>">Manage Applications <span class="nav-tag">4</span></a></li>
						<li><a href="<?php url('/add-job') ?>">Add Job</a></li>
					</ul>
				</li>

				<li><a>For Candidates</a>
					<ul>
						<li><a href="dashboard-manage-resumes.html">Manage Resumes <span class="nav-tag">2</span></a></li>
						<li><a href="dashboard-job-alerts.html">Job Alerts</a></li>
						<li><a href="dashboard-add-resume.html">Add Resume</a></li>
					</ul>
				</li>	
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="dashboard-my-profile.html">My Profile</a></li>
				<li><a href="index.html">Logout</a></li>
			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->


	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Manage Jobs</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="<?php url('/') ?>">Home</a></li>
							<li><a href="<?php url('/main') ?>">Dashboard</a></li>
							<li>Manage Jobs</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">

				<div class="notification notice">
					Your listings are shown in the table below. Expired listings will be archived and removed after 7 days.
				</div>

				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->

						<table class="manage-table responsive-table">

							<tr>
								<th><i class="fa fa-file-text"></i> Title</th>
								<th><i class="fa fa-check-square-o"></i> Filled?</th>
								<th><i class="fa fa-calendar"></i> Date Posted</th>
								<th><i class="fa fa-calendar"></i> Date Expires</th>
								<th><i class="fa fa-user"></i> Applications</th>
								<th><i class="fa fa-cog"></i> Actions</th>
							</tr>
									
							<!-- Item -->
							<?php //print("<pre>".print_r($data,true)."</pre>"); die(); ?>
							<?php foreach($data['jobs'] as $job): ?>
							<tr>
								<td class="title"><a href="<?php url('/job') . e('?id='.$job['id']) ?>"><?php e($job['job_title']) ?></a></td>
								<td class="centered"><?php echo (empty($job['filled_at'])) ? '-' : '<i class="fa  fa-check">' ?></td>
								<td><?php e(Carbon\Carbon::parse($job['created_at'])->toFormattedDateString()) ?></td>
								<td><?php e(Carbon\Carbon::parse($job['expired_at'])->toFormattedDateString()) ?></td>
								<td class="centered"><?php echo (empty($job['applications'])) ? '-' : '<a href="dashboard-manage-applications.html" class="button">Show ('.$job['applications'].')</a>'; ?></td>
								<td class="action">
									<a href="#"><i class="fa fa-pencil"></i> Edit</a>
									<a href="#"><i class="fa  fa-check "></i> Mark Filled</a>
									<a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>

						</table>

					</div>
				</div>
				<a href="#" class="button margin-top-30">Add New Listing</a>
			</div>

<?php the_dashfoot() ?>