<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>

<body>
    <?php echo "Hello World"; ?>
    <div class="container">
        <header>
            <h1><?= $personalInfo['name']; ?></h1>
            <p><?= $personalInfo['title']; ?></p>
            <p>Email: <?= $personalInfo['email']; ?> | Phone: <?= $personalInfo['phone']; ?></p>

            <?php if ($isAdmin): ?>
                <a href="<?= base_url('cv/edit'); ?>">Edit Personal Info</a> |
                <a href="<?= base_url('cv/logout'); ?>">Logout</a>
            <?php else: ?>
                <a href="<?= base_url('cv/login'); ?>">Admin Login</a>
            <?php endif; ?>
        </header>

        <section class="profile">
            <h2>Profile</h2>
            <p><?= $personalInfo['profile_description']; ?></p>
        </section>
    </div>
</body>

</html>