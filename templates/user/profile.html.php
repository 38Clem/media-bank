<?php include __DIR__ . ('/../_header.html.php') ?>

<div class="profile">
    <div class="card  d-flex justify-content-center border-secondary shadow p-3 mb-5 bg-white rounded" style="height:20vh;">
        <ul>
            <li> Pseudo : <?php echo $_SESSION["user"]->getName() ?></li>
        </ul>
    </div>
</div>



<?php include __DIR__ . ('/../_footer.html.php') ?>
