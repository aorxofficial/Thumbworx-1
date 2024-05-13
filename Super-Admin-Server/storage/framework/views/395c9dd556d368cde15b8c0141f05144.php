<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thumbworx</title>
</head>
<body>
    <h1><?php echo e($approvedMailData['title']); ?></h1>

    <p><?php echo e($approvedMailData['body']); ?></p>

    <p>Username: <?php echo e($approvedMailData['email']); ?></p>
    <p>Password: <?php echo e($approvedMailData['password']); ?></p>

    <p>Thank You.</p>

</body>
</html><?php /**PATH C:\xampp\htdocs\Thumbworx\Super-Admin-Server\resources\views/AccountApprovedMail.blade.php ENDPATH**/ ?>