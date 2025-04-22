<?php
require_once __DIR__ . '/../Database.php';


/** Check whether the page is accessible by user's role
 * @param string $role
 * @param array|null $required_roles
 * @return bool
 */
function check_accessibility(string $role, array|null $required_roles): bool
{
    $db = new Database();
    $roles = $db->get_roles();
    $role_name = array_values($roles);
    return in_array($role, $required_roles ?? $role_name);
}
