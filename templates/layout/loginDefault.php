<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8" />
    <title><?php echo $this->fetch('title'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <?= $this->Html->css(['styles', 'cake','bootstrap.min.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script(['https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', 'scripts',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js'
        ,'https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js','bootstrap.min.js']) ?>

</head>
<body class="bg-gray-700">
<main class="main">

    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
</footer>
</body>
</html>
