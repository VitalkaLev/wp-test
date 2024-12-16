<?php

function theme_cf7_telegram_handler($contact_form) {
    $botToken = get_field('acf_bot_token', 'option');
    $chatID = get_field('acf_chat_id', 'option');

    $submission = WPCF7_Submission::get_instance();

    if ($submission) {
        $posted_data = $submission->get_posted_data();

        $name = isset($posted_data['your-name']) ? sanitize_text_field($posted_data['your-name']) : '';
        $email = isset($posted_data['your-email']) ? sanitize_email($posted_data['your-email']) : '';
        $tel = isset($posted_data['your-tel']) ? sanitize_text_field($posted_data['your-tel']) : '';
        $message = isset($posted_data['your-message']) ? sanitize_textarea_field($posted_data['your-message']) : '';

        $utm_params = [
            'utm_source' => '',
            'utm_medium' => '',
            'utm_campaign' => '',
            'utm_traffic' => '',
            'utm_group' => '',
            'utm_term' => '',
            'utm_content' => '',
            'utm_keyword' => '',
        ];

        foreach ($utm_params as $param => $default) {
            $utm_params[$param] = isset($posted_data[$param]) ? sanitize_text_field($posted_data[$param]) : $default;
        }

        $message_text = "Request details:\n";
        $message_text .= "Name: $name\n";
        $message_text .= "Phone: $tel\n";
        $message_text .= "Email: $email\n";
        $message_text .= "Message: $message\n";

        $additional_info = '';
        foreach ($utm_params as $key => $value) {
            if (!empty($value)) {
                $additional_info .= ucfirst(str_replace('utm_', 'UTM ', $key)) . ": $value\n";
            }
        }

        if (!empty($additional_info)) {
            $message_text .= "\nAdditional information:\n" . $additional_info;
        }

        $url = "https://api.telegram.org/bot$botToken/sendMessage";
        $params = [
            'body' => [
                'chat_id' => $chatID,
                'text' => $message_text,
            ],
        ];

        $response = wp_remote_post($url, $params);

        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();
        } else {
            $result = wp_remote_retrieve_body($response);
        }
    }
}


add_action('wpcf7_mail_sent', 'theme_cf7_telegram_handler');