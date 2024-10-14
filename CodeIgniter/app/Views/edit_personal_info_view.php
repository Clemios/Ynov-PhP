<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Information</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css'); ?>">
</head>

<body>
    <div class="container">
        <h2>Edit Personal Information</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $personalInfo['name']; ?>" required>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $personalInfo['title']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $personalInfo['email']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?= $personalInfo['phone']; ?>" required>

            <label for="profileDescription">Profile Description:</label>
            <textarea id="profileDescription" name="profile_description" required><?= $personalInfo['profile_description']; ?></textarea>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>