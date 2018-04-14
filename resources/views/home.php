<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $message; ?></title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Lodash -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
      .user {
        padding-top: 2px;
        padding-bottom: 2px;
      }

      .user pre {
        margin-bottom: 0;
      }

      .user button {
        border: none;
      }

      .user button:hover {
        text-decoration: underline;
      }

      .user button:focus {
        outline: none;
      }
    </style>
  </head>
  <body>
    <header class="page-header text-center">
      <h1><?php echo $message; ?></h1>
    </header>


    <main class="container">
      <h2>New User</h2>
      <form action="/users" method="post">
        <div class="form-group">
          <input
            type="text"
            name="username"
            class="form-control"
            placeholder="Username"
            autofocus>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary">
        </div>
      </form>

      <h2>Users</h2>
      <?php if (count($users)): ?>
          <?php foreach ($users as $user): ?>
            <div class="user row">
              <div class="col-xs-11">
                <pre><?php echo $user->toJson(); ?></pre>
              </div>
              <div class="col-xs-1">
                <form action="/users/<?php echo $user->id; ?>" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <button class="text-danger" type="submit">&times;</button>
                </form>
              </div>
            </div>
          <?php  endforeach; ?>
      <?php else: ?>
        <p class="text-muted">No users yet...</p>
      <?php endif; ?>
    </main>
  </body>
</html>

