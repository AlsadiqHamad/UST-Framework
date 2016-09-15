<?php include'head.php'; ?>

<div class="container"> 
<h1>Tenant Accounts</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>User Name</th>
      <th>Table</th>
      <th>Orgnization</th>
	  <th>id</th>
    </tr>
  </thead>
  <tbody>
  



<?php foreach($data as $field): ?>       		
	<tr>
      <td><?= $field['user'] ?></td>
      <td><?= $field['scma'] ?></td>
      <td><?= $field['orgniz'] ?></td>
	  <td><a href="<?= PATH?>admin/del/<?= $field['id'] ?>"><button class=" btn btn-danger glyphicon glyphicon-trash"> DELETE</button></a></td>
    </tr>

<?php endforeach?>



    
  
  </tbody>
</table>




</div><!-- end container-->
<script src="<?= PATH?>system/asset/js/jquery.min.js"></script>
<script src="<?= PATH?>system/asset/js/bootstrap.js"></script>

</body>
</html>

