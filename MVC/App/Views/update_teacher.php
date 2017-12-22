<!DOCTYPE html>
<html>
<body>

<link rel="stylesheet" type="text/css" href="../../../App/Views/styles.css" />
<?php
	foreach ($result as $key=>$value) 
	{
		foreach($value as $key=>$value)
		{
			$data[$key] = $value;
		}
	}
?>
<h2>update teacher</h2>

<form method="post" action="../update/<?php echo $data[id]?>">

  <div class="container">
    <label><b>First name</b></label>
    <input value="<?php echo $data[first_name]?>" type="text" placeholder="Enter first name" name="f_name" required>

    <label><b>Last name</b></label>
    <input value="<?php echo $data[last_name]?>" type="text" placeholder="Enter last name" name="l_name" required>
        
    <button type="submit">Update</button>
  </div>
</form>

</body>
</html>