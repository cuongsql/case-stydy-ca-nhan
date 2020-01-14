<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($note as $start=>$value):?>
    <tr>
    <td scope="row"><?php echo ++$start ?></td>
    <td><a href="index.php?page=detailNote&id=<?php echo $value->getId() ?>"><?php echo $value->getTitle() ?></a></td>
    <td><?php echo $value->getType_id() ?></td>
    <td><a class="btn btn-success" href="index.php?page=editNote&id=<?php echo $value->getId() ?>">Edit</a>
                <a href="index.php?page=deleteNote&id=<?php echo $value->getId() ?>"
                    onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>