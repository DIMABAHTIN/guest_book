<?php
if(isset($data['posts']) && !empty($data['posts'])):
    echo '<table class="table table-striped">' .
    '<tr><th>Name</th><th>Email</th><th>Date</th><th>Text</th></tr>';

    foreach ($data['posts'] as $row):
        echo '<tr><td class="name">' . $row['user_name'] . '</td><td class="email">' . $row['email'] . '</td>' .
        '<td>' . date('d-m-Y H:i:s', $row['time']) . '</td><td>' . $row['text'] . '</td></tr>';
    endforeach;

    echo '</table>';

    echo $data['pagination'];

endif;
?>
