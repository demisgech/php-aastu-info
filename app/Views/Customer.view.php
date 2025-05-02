<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>

<body>
    <h1>Hello world! Wolcome to customers page</h1>

    <ul class="list-group">
        <?php foreach ($customers as $customer): ?>
            <li class="list-group-item">
                <strong><?= $customer['name'] ?></strong>
                <?= $customer['email'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>