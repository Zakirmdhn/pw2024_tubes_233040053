<?php
require '../Admin/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM travel WHERE
        nama LIKE '%$keyword%' OR 
        id_kota LIKE '%$keyword%' OR   
        tanggal LIKE '%$keyword%'
        ";
$travel = query($query);

?>

<div class="row">
    <?php foreach ($travel as $row) : ?>
<div class="col-lg-4 col-md-6 my-2  d-f;ex justify-content-around">

<div class="card" style="width: 18rem;">
  <img src="../asset/IMG/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
  <div class="card-body text-center" style="background-color:darkgrey;">
    <h5 class="card-title"><?= $row["nama"];?></h5>
    <br>
    <a href="details.php?id=<?= $row["id"]; ?>" class="badge text-bg-dark text-decoration-none">details</a>
  </div>
</div>
</div>
<?php endforeach; ?>
  </div>
</table>