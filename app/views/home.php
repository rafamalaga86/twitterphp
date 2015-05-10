<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>eKomi Twitter</title>

    <!-- CSS -->
    <link href="app/css/bootstrap.min.css" rel="stylesheet">
    <link href="app/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
                <a class="navbar-brand" href="#">Twitter PHP</a>

            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- /.row -->


        <?php foreach ( (array)$tweets as $tweet): ?>

            <blockquote class="row twitter-tweet">
                <div class="col-lg-12">
                    <div><p class="lead"> <?= $tweet["text"] ?> </p></div>

                    <div>
                        <span> - </span>
                        <span> <?= $tweet["name"] ?> </span>
                        <span> (@<?= $tweet["screen_name"] ?> ) </span>
                        <span> <?= $tweet["created_at"] ?> </span>
                    </div>
                    
                    <div class="action-row">
                        <a href=""><i class="icon icon--reply"></i></a>
                        <a href="https://api.twitter.com/1.1/statuses/retweet/<?= $tweet["id"] ?>.json"><i class="icon icon--retweet"></i></p>
                        <a href="https://api.twitter.com/1.1/favorites/create.json?id=<?= $tweet["tt_id"] ?>"><i class="icon icon--favorite"></i></a>
                    </div>

                </div>
            </blockquote>

        <?php endforeach; ?>

        <!-- /.row -->


    </div>
    <!-- /.container -->



</body>

</html>