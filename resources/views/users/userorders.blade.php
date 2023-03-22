<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white fs-4">
            <a href="home.php" class="text-white text-decoration-none  fs-4">Home /</a>
            Moje porudžbine /
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card card-body shadow mt-3">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking broj</th>
                                <th>Cena</th>
                                <th>Datum</th>
                                <th>Akcija</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['trackingNo']; ?></td>
                                        <td><?= $item['totalPrice']; ?></td>
                                        <td><?= $item['created_at']; ?></td>
                                        <td><a href="viewOrder.php?t=<?= $item['trackingNo']; ?>" class="btn btn-primary">Vidi detalje</a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Nema realizovanih porudžbina</td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>