<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ticket Statues
    |--------------------------------------------------------------------------
    |
    | Tickets can have one of four statuses (new, awaiting_customer, awaiting_reply, and closed)
    | Here you can set the human readable text to be displayed for each status as well as the
    | class used for the label, they are bootstrap classes and you may use the following:
    | default, primary, success, info, warning, danger.
    */
    'statuses' => [

        'new' => [
            'text' => 'New',
            'class' => 'success'
        ],

        'awaiting_customer' => [
            'text' => 'Awaiting Customer',
            'class' => 'info'
        ],

        'awaiting_reply' => [
            'text' => 'Awaiting Reply',
            'class' => 'warning'
        ],

        'closed' => [
            'text' => 'Closed',
            'class' => 'danger'
        ],
    ]
];
