<?php include('header.php'); 
$url = 'https://api.coursera.org/api/partners.v1?Gtv4Xb1-EeS-ViIACwYKVQ&fields=language,description,banner,courseIds,instructorIds,links,location';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$partner_result = json_decode($result, true);

//echo "<pre>"; print_r($courses_result); die;
$id=$_REQUEST['id'];
$partner_result1=$partner_result['elements'];
if($partner_result1){
foreach($partner_result1 as $partner){
if($id==$partner['id']){
?>
<div class="course-detail-pg">
	<div class="col-md-12">
		<!--div class="col-md-3">
			<div class="course-img">
			<?php if($partner['photo']!=""){ ?>
				<img src="<?php echo $partner['photo']; ?>" >
			<?php } ?>
			</div>
		</div-->
		<div class="col-md-12">
		<div class="right-content-course-detail">
			<?php if($partner['name']!=""){ ?>
			
			<h2><?php echo $partner['name']; ?></h2>
			
			<?php } if($partner['description']!=""){ ?>	
			
			<div class="courses-description"><?php echo $partner['description'];  ?></div>
			
			<?php } 
			if($partner['shortName']!=""){ 
			?>
			
			<div class="categories">
				<strong>Short Name : </strong>
				<span><?php echo $partner['shortName']; ?></span>
			</div>
			
			
			<?php } if($partner['instructorIds']!=""){ ?>
			<div class="categories">
				<strong>Instructor : </strong>
				<span>
				<?php 
				foreach($partner['instructorIds'] as $instructorIds){
				echo $instructorIds.", "; 
				}
				?> 
				
				</span>
			</div>
			
			<?php } if($partner['location']!=""){ ?>
			<div class="categories">
				<strong>Location : </strong>
				<span>
				<?php echo $partner['location']['name']; ?> 
				
				</span>
			</div>
			
			<?php } if($partner['links']!=""){ ?>
			<div class="categories">
				<strong>Links : </strong>
				<span>
				<a href="https://www.youtube.com/<?php echo $partner['links']['youtube']; ?>" target="_blank">Youtube</a>
				<a href="https://twitter.com/<?php echo $partner['links']['twitter']; ?>" target="_blank">Twitter</a>
				<a href="https://www.facebook.com/<?php echo $partner['links']['facebook']; ?>" target="_blank">Facebook</a>
				<a href="<?php echo $partner['links']['website']; ?>" target="_blank">Website</a>
				</span>
			</div>
			
			<?php } if($partner['courseIds']!=""){ ?>
			<div class="categories">
				<strong>CourseIds : </strong>
				<span>
				<?php 
				foreach($partner['courseIds'] as $courseIdss){
				echo $courseIdss.", "; 
				}
				?> 
				
				</span>
			</div>
			<?php } ?>
			
		</div>
	</div>
</div>

<?php
}
}
}
include('footer.php'); ?>