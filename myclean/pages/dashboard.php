<?php
session_start();
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../includes/functions.php';
/*Function for switching*/
$section = $_GET['section'] ?? 'profile';
function active($s, $section): string
{
    return $s === $section ? 'active' : '';
}

$db = new Database();
?>


<!DOCTYPE html>
<html lang="en">
<?php $section_name = "Dashboard";
$stylesheets = ['/assets/stylesheets/dashboard.css'];
require_once __DIR__ . '/../includes/head.php'
?>
<body>
<?php require_once __DIR__ . '/../includes/navbar.php' ?>
<!--<div class="container">-->
<!--If not logged in-->
<?php if (!(isset($_SESSION['is_login']) and $_SESSION['is_login'])): ?>
    <?php header('location: /pages/auth/login.php'); ?>

<?php else: ?>
    <!-- Sidebar -->
    <div class="sidebar border-end">
        <h5 class="text-center mb-4">Account Settings</h5>
        <ul class="nav flex-column px-3">
            <li class="nav-item">
                <a class="nav-link <?= active('profile', $section) ?>" href="?section=profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('security', $section) ?>" href="?section=security">Security</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('notifications', $section) ?>"
                   href="?section=notifications">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('payments', $section) ?>" href="?section=payments">Payment Methods</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= active('subscription', $section) ?>"
                   href="?section=subscription">Subscription</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="#">Logout</a>
            </li>
        </ul>
    </div>
    <!-- Main content -->
    <div class="main-content">
        <!--Sections-->
        <?php switch ($section): ?>
<?php case 'profile': ?>
            <?php $profile = $db->getUser('uid', $_SESSION['uid']); ?>
            <h2>Profile</h2>
            <div class="container">
                <form id="profileForm" method="POST" action="/includes/save_profile.php">
                    <!--Name-->
                    <div class="row">
                        <div class="col">
                            <label for="inputFirstName">Given name</label>
                            <input type="text" name="first_name" class="form-control" id="inputFirstName"
                                   placeholder="First name"
                                   value="<?= htmlspecialchars($profile['first_name']) ?>" disabled
                            >
                        </div>
                        <div class="col">
                            <label for="inputLastName">Family Name</label>
                            <input type="text" name="last_name" class="form-control" id="inputLastName"
                                   placeholder="Last name"
                                   value="<?= htmlspecialchars($profile['last_name']) ?>" disabled>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                    </div>
                    <!--DoB-->
                    <div class="row">
                        <div class="form-group">
                            <label for="inputDoB">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" id="inputDoB"
                                   placeholder="Date of birth" pattern="\d{4}-\d{2}-\d{2}"
                                   value="<?= htmlspecialchars($profile['DoB']) ?>" disabled>
                        </div>
                    </div>
                    <!--Email-->
                    <div class="row">
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                   aria-describedby="emailHelp"
                                   placeholder="Enter email"
                                   value="<?= htmlspecialchars($profile['email']) ?>" disabled>
                        </div>
                    </div>
                    <!--Phone-->
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="0123-456-789"
                               pattern="[0-9]{10}"
                               value="<?= htmlspecialchars($profile['phone']) ?>" disabled>
                    </div>
                    <!--Address-->
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" name="address1" class="form-control" id="inputAddress"
                               placeholder="1 Mains Road"
                               value="<?= htmlspecialchars($profile['address1']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" name="address2" class="form-control" id="inputAddress2"
                               placeholder="Apartment, studio, or floor"
                               value="<?= htmlspecialchars($profile['address2']) ?>" disabled>
                    </div>
                    <!--City-->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City / Suburb</label>
                            <input type="text" name="city" class="form-control" id="inputCity"
                                   value="<?= htmlspecialchars($profile['city']) ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" name="state" class="form-control" disabled>
                                <?php
                                // The default
                                echo "<option selected>" . htmlspecialchars($profile['state']) . "</option>";
                                include __DIR__ . '/../includes/stateName.php';
                                // Read array
                                /** @var array $state_names imported from stateName.php */
                                foreach ($state_names as $state) {
                                    echo "<option>$state</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" class="form-control" id="postcode" disabled>
                        </div>
                    </div>
                    <!--Buttons-->
                    <button type="button" id="editBtn" class="btn btn-primary">Edit</button>
                    <button type="submit" id="saveBtn" class="btn btn-success d-none">Save</button>
                    <button type="button" id="cancelBtn" class="btn btn-secondary d-none">Cancel</button>
                </form>
            </div>

            <script>
                // Corresponding IDs to the elements
                const inputIds = [
                    'inputFirstName', 'inputLastName', 'inputDoB', 'inputEmail', 'phone',
                    'inputAddress', 'inputAddress2', 'inputCity', 'inputState', 'postcode'
                ];
                // Temporarily save the variables
                const originalFields = {}
                // Get buttons
                const editBtn = document.getElementById('editBtn');
                const saveBtn = document.getElementById('saveBtn');
                const cancelBtn = document.getElementById('cancelBtn');
                // Click the edit btn
                document.getElementById('editBtn').addEventListener('click', function () {
                    // Collect input values into an array
                    /*const values = */inputIds.map(id => {
                        // Get elements according to IDs
                        /** @type {HTMLInputElement|null} */
                        let element = document.getElementById(id);
                        if (element) {
                            element.disabled = false;
                            originalFields[id] = element.value; // Save original value
                        }
                        return element ? element.value : '';
                    });
                    // console.log(originalFields); // For debugging or use the values list as needed
                    // Update button visibility
                    editBtn.classList.add('d-none');
                    saveBtn.classList.remove('d-none');
                    cancelBtn.classList.remove('d-none');
                });

                // Click the cancel btn
                cancelBtn.addEventListener('click', () => {
                    inputIds.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) {
                            element.value = originalFields[id] || ''; // Restore saved value
                            element.disabled = true;
                        }
                    });
                    // Restore button visibility
                    editBtn.classList.remove('d-none');
                    saveBtn.classList.add('d-none');
                    cancelBtn.classList.add('d-none');
                });
            </script>
        <?php break; ?>
        <?php case 'security': ?>
            <h2>Security Settings</h2>
            <p>Change your password or enable two-factor authentication.</p>
            <a href="#" class="btn btn-outline-warning">Change Password</a>
            <a href="#" class="btn btn-outline-warning">Delete Account</a>
        <?php break; ?>
        <?php case 'notifications': ?>
            <h2>Notification Preferences</h2>
            <p>Choose which alerts you want to receive via email or SMS.</p>
            <a href="#" class="btn btn-outline-info">Update Notifications</a>
        <?php break; ?>
        <?php case 'payments': ?>
            <h2>Payment Methods</h2>
            <p>Manage your saved credit cards and billing information.</p>
            <a href="#" class="btn btn-outline-success">Manage Payments</a>
        <?php break; ?>
        <?php case 'subscription': ?>
            <h2>Subscription Plan</h2>
            <p>You are currently subscribed to the Premium Plan.</p>
            <a href="#" class="btn btn-outline-secondary">Change Plan</a>
        <?php break; ?>
        <?php default: ?>
            <H1>Welcome to MyClean Dashboard</H1>
        <?php endswitch; ?>
    </div>

<?php endif; ?>
<!--</div>-->
</body>
</html>
