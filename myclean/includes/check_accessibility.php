<?php
/** Check whether current role is eligible to gain access
 * @param string $role role of current user
 * @param array $required_roles required role
 * @return bool
 */
function check_accessibility(string $role, array $required_roles = ['user', 'admin']): bool
{
    return in_array($role, $required_roles);
}
