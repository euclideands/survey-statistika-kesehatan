<?php 
include('header.php');
?>
<title>phpzag.com : Demo Multi Select Dropdown with Checkbox using Bootstrap, jQuery and PHP</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<?php include('container.php');?>
<div class="container">
	<h2>Example: Multi Select Dropdown with Checkbox using Bootstrap, jQuery and PHP</h2>
    <br><br>	
	<pre><?php print_r ($_POST['languages']); ?></pre>	
</div>
<?php include('footer.php');?>