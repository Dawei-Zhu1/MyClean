<?php
// Normally, you would fetch this from a database
$profile = [
    'name' => 'Jane Doe',
    'email' => 'jane@example.com'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile - MyClean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Profile</h2>
    <form id="profileForm" method="POST" action="save_profile.php">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($profile['name']) ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($profile['email']) ?>" disabled>
        </div>
        <button type="button" id="editBtn" class="btn btn-primary">Edit</button>
        <button type="submit" id="saveBtn" class="btn btn-success d-none">Save</button>
        <button type="button" id="cancelBtn" class="btn btn-secondary d-none">Cancel</button>
    </form>
</div>

<script>
    const form = document.getElementById('profileForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    let originalName = nameInput.value;
    let originalEmail = emailInput.value;

    editBtn.addEventListener('click', () => {
        nameInput.disabled = false;
        emailInput.disabled = false;
        editBtn.classList.add('d-none');
        saveBtn.classList.remove('d-none');
        cancelBtn.classList.remove('d-none');
    });

    cancelBtn.addEventListener('click', () => {
        nameInput.value = originalName;
        emailInput.value = originalEmail;
        nameInput.disabled = true;
        emailInput.disabled = true;
        editBtn.classList.remove('d-none');
        saveBtn.classList.add('d-none');
        cancelBtn.classList.add('d-none');
    });
</script>
</body>
</html>
