<?php

$reddit_data = [
    'arch' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/archlinux/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'debian' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/debian/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'fedora' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/fedora/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'manjaro' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/manjarolinux/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'opensuse' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/opensuse/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'ubuntu' => [
        'global' => [
            'url' => 'https://www.reddit.com/r/ubuntu/',
        ],
        'china' => [
            'url' => null,
        ],
    ],
];

foreach ($reddit_data as $distro => $groups) {
    foreach ($groups as $region => $group_data) {
        if ($group_data['url']) {
            $json = file_get_contents($group_data['url'].'about.json');
            $arr = json_decode($json, true);
            $reddit_data[$distro][$region]['members'] = $arr['data']['subscribers'];
        } else {
            $reddit_data[$distro][$region]['members'] = 0;
        }
    }
}

$data['reddit'] = $reddit_data;
