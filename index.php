<?php require "./partials/header.php";
?>
<div class="container mt-n5 bg-white p-5">
    <div class="card-columns">
    <?php foreach(index($_REQUEST['page']) as $key => $qoute): ?>

        <div class="card  mb-3">
            <div class="card-header">
               <span class="text-primary">
                <?php echo $qoute['whose_qoute']; ?>

               </span>

                <a class="close" href="index.php?action=delete&id=<?php echo $qoute['id']; ?>">
                    <span aria-hidden="true">&times;</span>
                </a>

            </div>
            <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="qoute"><?php echo $qoute['qoute']; ?></p>
                        </blockquote>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <?php paginate(); ?>
</div>
<?php require "./partials/footer.php"; ?>

