
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr class="text-center">
            <th>Sl NO</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $select_cat = "SELECT * FROM categories";
    $result = mysqli_query($con,$select_cat);
    $num=0;
    while($row=mysqli_fetch_assoc($result)){
        $categori_id=$row['category_id'];
        $categori_title=$row['category_title'];
        $num++;
    ?>

        <tr class="text-center">
            <td><?php echo $num; ?></td>
            <td><?php echo $categori_title; ?></td>
            <td><a href="index.php?edit_category=<?php echo $categori_id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="index.php?delete_category=<?php echo $categori_id; ?>" type="button" class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>

        <button type="button" class="btn btn-primary"><a href="index.php?delete_category=<?php echo $categori_id; ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>


