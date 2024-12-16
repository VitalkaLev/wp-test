<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter('wpcf7_autop_or_not', '__return_false');

// add_filter('wpcf7_validate', 'custom_required_message', 20, 2);
function custom_required_message($result, $tag) {
    $required_fields = [
        'your-name'  => 'Вкажіть Ваше Ім’я',
        'your-email' => 'Вкажіть Ваш Email',
        'your-tel'   => 'Вкажіть Ваш Номер Телефону'
    ];

    $name = $tag->name;
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';

    if (array_key_exists($name, $required_fields) && empty($value)) {
        $result->invalidate($tag, $required_fields[$name]);
    }

    return $result;
}

add_filter('wpcf7_ajax_json_echo', 'customize_cf7_messages_per_field', 10, 2);
function customize_cf7_messages_per_field($response, $result) {


    if ($response['status'] === 'validation_failed') {
        $invalid_fields = $response['invalid_fields'];
        
        // Індивідуальні повідомлення для різних полів
        $field_messages = [
            'your-name'  => 'Вкажіть Ваше ім’я',
            'your-email' => 'Вкажіть Ваш email',
            'your-tel'   => 'Вкажіть Ваш номер телефону'
        ];

        foreach ($response['invalid_fields'] as &$invalid_field) {

            $field_name = $invalid_field['field']; 

            if (isset($field_messages[$field_name])) {
                $invalid_field['message'] = $field_messages[$field_name];
            }
        }

    }

    return $response;
}



// lead save
add_action('wpcf7_mail_sent', 'save_cf7_lead_to_post_type');

function save_cf7_lead_to_post_type($contact_form) {
  
    $submission = WPCF7_Submission::get_instance();

    if ($submission) {
       
        $data = $submission->get_posted_data();

        $name = isset($data['your-name']) ? sanitize_text_field($data['your-name']) : '';
        $email = isset($data['your-email']) ? sanitize_email($data['your-email']) : '';
        $tel = isset($data['your-tel']) ? sanitize_text_field($data['your-tel']) : '';
        $message = isset($data['your-message']) ? sanitize_textarea_field($data['your-message']) : '';

        wp_insert_post([
            'post_type'   => 'lead',
            'post_title'  => $name,
            'post_status' => 'publish',
            'meta_input'  => [
                'lead_name' => $name,
                'lead_email' => $email,
                'lead_tel' => $tel,
                'message' => $message

            ],
        ]);

    }
}

