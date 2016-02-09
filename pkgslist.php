<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
    $status = $_POST["status"];
$query ="SELECT * FROM Packages WHERE package like '" . $_POST["keyword"] . "%' and server_name='Localhost' and status='".$status."' LIMIT 0,10";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<?php if($status == "Available") {?>
<li onClick="selectCountry('<?php echo $country["package"]; ?>');"><?php echo $country["package"]; ?></li>

<?php 
}
else { ?>

<li onClick="selectCountry1('<?php echo $country["package"]; ?>');"><?php echo $country["package"]; ?></li>

<?php }

} ?>
</ul>
<?php } } ?>
