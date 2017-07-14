<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : "Главная" ?></title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <form class="form-horizontal" id="js-form">
            <fieldset>

                <!-- Form Name -->
                <legend>New post</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Name</label>
                    <div class="col-md-4">
                        <input id="name" name="name" type="text" placeholder="" class="form-control input-md" >

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="text" placeholder="" class="form-control input-md" >

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="homepage">Homepage</label>
                    <div class="col-md-4">
                        <input id="homepage" name="homepage" type="text" placeholder="" class="form-control input-md" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="textarea">Text</label>
                    <div class="col-md-4">
                        <textarea class="form-control" id="textarea" name="text"></textarea>
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Send</label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="button" class="btn btn-primary">Send</button>
                    </div>
                </div>

            </fieldset>
        </form>
        <div id="js-result">

        <?php include 'form.tpl.php'; ?>
        </div>
    </div>
</body>
</html>