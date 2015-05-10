<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TwitterPHP</title>

    <!-- Bootstrap Core CSS -->
    <link href="app/css/bootstrap.min.css" rel="stylesheet">
    <link href="app/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

        <?php var_dump($tweets); ?>


        <?php foreach ($tweets as $tweet): ?>

            <?php //var_dump($tweet); ?>
            
            <blockquote class="row twitter-tweet">
                <div class="col-lg-12">
                    <div><p class="lead"> <?= $tweet["text"] ?> </p></div>

                    <div>
                        <span> - </span>
                        <span> <?= $tweet["user"]["name"] ?> </span>
                        <span> (@<?= $tweet["user"]["screen_name"] ?> ) </span>
                        <span> <?= $tweet["created_at"] ?> </span>
                    </div>
                    
                    <div class="action-row">
                        <a href=""><i class="icon icon--reply"></i></a>
                        <a href="https://api.twitter.com/1.1/statuses/retweet/<?= $tweet["id"] ?>.json"><i class="icon icon--retweet"></i></p>
                        <a href="https://api.twitter.com/1.1/favorites/create.json"><i class="icon icon--favorite"></i></a>
                    </div>

                </div>
            </blockquote>

        <?php endforeach; ?>

        <!-- /.row -->
        <?php var_dump($tweets[0]); ?>


    </div>
    <!-- /.container -->



</body>

</html>