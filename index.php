<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>PHP CRUD application</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center my-5">
    <form action="server.php" method="post" style="width: 500px;">
    <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name" placeholder="Enter your full name">
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
    <label for="phone">Phone</label>
    <input class="form-control" type="text" name="phone" placeholder="Phone number">
    </div>
    <div class="form-group">
    <label for="location">Location</label>
    <input class="form-control" type="text" name="location" placeholder="Location">
    </div>
    <br>

    <button class="btn btn-primary" type="submit">Submit</button>

    
    </form>
    </div>
    </div>
</body>
</html>