<?php

$matrix_data = [
    'arch' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!SEgsRQLScqPxYtucHl:archlinux.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'debian' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!ZjJkQNQAlmRlGyyPSZ:matrix.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'fedora' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!sWugvEqzNjUsmflyPC:matrix.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'manjaro' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!PvQGNjiCNulFZsMPud:matrix.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'opensuse' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!NzBQLMpeqDztVJtPZV:matrix.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'ubuntu' => [
        'global' => [
            'url' => 'https://view.matrix.org/room/!uGTCmJuKfnAYNPNsZz:matrix.org/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
];

foreach ($matrix_data as $distro => $groups) {
    foreach ($groups as $region => $group_data) {
        if ($group_data['url']) {
            $html = file_get_contents($group_data['url']);
            preg_match('/(\d+)\sMembers/', $html, $matches);
            $matrix_data[$distro][$region]['members'] = intval($matches[1]);
        } else {
            $matrix_data[$distro][$region]['members'] = 0;
        }
    }
}

$data['matrix'] = $matrix_data;
