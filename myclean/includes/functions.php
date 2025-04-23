<?php
/** Keep content when the validation fails.
 * @param string $input_type
 * @param string $element_name
 * @return string
 */
function keepContent(string $input_type, string $element_name): string
{
//    If postValue exists, get the value, else null
    $postValue = $_POST[$element_name] ?? null;
    switch ($input_type) {
        case 'checked':
            return '';
        default:
            // If form is posted then return the value
            return isset($postValue) ? htmlspecialchars($_POST[$element_name]) : '';
    }
}
