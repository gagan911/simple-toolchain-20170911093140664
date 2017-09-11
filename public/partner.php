<?php
/*require_once('PHP-iTunes-API-master/classes/itunes.php');
$results = iTunes::search('maroon 5', array(
    'tag' => 'content'
))->results;
echo"<pre>";print_r($results);echo"</pre>";
echo json_encode($results); */

?>
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
$partner_details = json_decode($result, true);
 

?>

<div class="main-courses-section">
<div class="sub-main-courses-section">
<table>
<tbody>
<tr>
<th>Sr.No.</th>
<th>Partner Name</th>
<th>Short Name</th>
<th>Action</th>
</tr>

<?php 
$j=1;
$partner_details1=$partner_details['elements'];
if($partner_details1){
foreach($partner_details1 as $partner_details2){
?>
<tr align="center" border="1" color="#ccc">
<td width="10%"><?php echo $j; ?></td>
<td width="55%"><?php echo $partner_details2['name']; ?></td>
<td width="20%"><?php echo $partner_details2['shortName']; ?></td>
<td width="15%"><a href="partner_detail.php?id=<?php echo $partner_details2['id']; ?>">View Detail</a></td>


</tr>

<?php
$j++; 
}
}
?>
</tbody>
</table>
</div>
</div>

<?php include('footer.php'); ?>




