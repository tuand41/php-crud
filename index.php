<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
</head>
<body>
    <?php include 'data.php' ?>
    <div class="container mt-4">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="row col-md-12 mb-4"><h1><a style="text-decoration:none;" href="index.php">HOME</a></h1></div>
        <div class="row">
            <div class="col-md-4">
                <form action="data.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="name">name:</label>
                        <input type="text" name="name" class="form-control" placeholder="name" id="name" value=<?php echo $name; ?>>
                    </div>
                    <div class="form-group">
                        <label for="address">address:</label>
                        <input type="text" name="address" class="form-control" placeholder="address" id="address" value=<?php echo $address; ?>>
                    </div>
                    <?php if (isset($_GET['edit'])): ?>
                        <button name="update" class="btn btn-primary">update</button>
                    <?php else: ?>
                        <button name="save" class="btn btn-primary">save</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>address</th>
                            <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $increaseId = 0;
                            while($row = $result->fetch_assoc()): 
                        ?>
                            <tr>
                                <td><?php echo $increaseId; $increaseId++ ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                    <a href="data.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">edit</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
