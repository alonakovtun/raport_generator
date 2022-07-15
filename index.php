<!DOCTYPE html>

<?php 


    require_once($_SERVER['DOCUMENT_ROOT'].'/classes/Categories.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/classes/Items.php');

    $categories = new Categories(); 
?>

<style>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/assets/style.css'); ?>
</style>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <title>Raports</title>
    </head>

    <body>
        <?php foreach ($categories->list() as $category) { ?>
            <div class="table-block">
                <div class="category-name"><?php echo $category['name'] ?></div>

                <table class="item-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PRICE($)</th>
                            <th>TOTAL AMOUNT</th>
                            <th>SOLD AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $items = new Items();

                        foreach ($items->list() as $item) {
                            if ($category['name'] == $item['category_name']) {
                                echo "
                                <tr>
                                    <td>" . $item['id'] . "</td>
                                    <td>" . $item['item_name'] . "</td>
                                    <td>" . $item['price'] . "</td>
                                    <td>" . $item['total_amount'] . "</td>
                                    <td>" . $item['sold_amount'] . "</td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/factory/RaportFactory.php" method="POST">
                                    <input name="category" type="hidden" value="<?php echo $category['slug'] ?>">
                                    <button type="submit" class="raport-generator">Generate raport</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        <?php } ?>


    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/assets/script.js'); ?>
    </script>

</html>