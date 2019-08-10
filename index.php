<?php require "./header.php";
?>
<div class="container my-5">
    <div class="row">
    <?php foreach(index($_REQUEST['page']) as $key => $qoute): ?>
        <div class="col-md-4">
            <div class="shadow p-4 mb-4">

                <a class="close" href="index.php?action=delete&id=<?php echo $qoute['id']; ?>">
                    <span aria-hidden="true">&times;</span>
                </a>

                <blockquote class="blockquote">
                    <p class="qoute"><?php echo $qoute['qoute']; ?></p>
                    <footer class="blockquote-footer">
                        <?php echo $qoute['whose_qoute']; ?>
                    </footer>
                </blockquote>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <?php paginate(); ?>
</div>
<?php require "./footer.php"; ?>

