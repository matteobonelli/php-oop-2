<div class="col-12 col-md-4 col-lg-3">
    <div class="card h-100" style="width: 18rem;">
        <img src="<?= $image ?>" class="card-img-top" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text overflow-y-auto">
                <?= $descr ?>
            </p>
            <div>
                <?= $printGenre ?>
            </div>
            <?php if (isset($authors)) { ?>
                <?= $authors ?>
            <?php }
            if (isset($flag)) { ?>
                <div class="d-flex justify-content-between ">
                    <div>
                        <div class="flag">
                            <img src="img/<?= $flag ?>" alt="<?= $lang ?>">
                        </div>
                        <small>
                            <?= $release ?>
                        </small>
                    </div>
                    <div class="text-warning">
                        <?= $vote ?>
                    </div>
                </div>
            <?php } ?>
            <div>
                Quantità:
                <?= $quantity . "<br>" ?>
                <?= $price ?> $ <br>
                <?php if ($sconto > 0) { ?>
                    <div>Sconto:
                        <?= $sconto ?>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div>