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
    <link href="app/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="app/public/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <img class="logo" src="app/public/images/ekomi-logo.png" width="45">
            <a class="navbar-brand" href="#">eKomi Twitter</a>

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
                        <a class="action-link answer-button" href="#" data-toggle="modal" data-target="#myModal" data-ttid="<?= $tweet["tt_id"] ?>"><i class="icon icon--reply"></i></a>
                        <a class="action-link <?= isset($tweet['retweeted']) && $tweet['retweeted'] != 0 ? 'on' : '' ?>" href="http://testing.clickcreacion.com/twitterphp/app/scripts/retweet.php?id=<?= $tweet["tt_id"] ?>"><i class="icon icon--retweet"></i></p>
                        <a class="action-link <?= isset($tweet['favorited']) && $tweet['favorited'] != 0 ? 'on' : '' ?>" href="http://testing.clickcreacion.com/twitterphp/app/scripts/favourite.php?id=<?= $tweet["tt_id"] ?>"><i class="icon icon--favorite"></i></a>
                    </div>

                </div>
            </blockquote>

        <?php endforeach; ?>

        <!-- /.row -->


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="answer-tweet-form" action="">
                    <div class="modal-body">
                            <textarea maxlength="140" name="status"></textarea>
                            <input class="hidden" id="ttid" name="ttid" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button submit" class="btn btn-primary" id="send-form">Answer</button>
                    </div>
                </form>
            </div>
        </div>
        </div>


    </div>
    <!-- /.container -->


    <!-- javascript for the reply tweet feature -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="app/public/js/bootstrap.min.js"></script>
    <script src="app/public/js/answer.js"></script>



</body>

</html>