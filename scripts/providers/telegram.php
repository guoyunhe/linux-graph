<?php

$telegram_data = [
    'arch' => [
        'global' => [
            'url' => 'https://t.me/archlinuxgroup',
        ],
        'china' => [
            'url' => 'https://t.me/archlinuxcn_group',
        ],
    ],
    'debian' => [
        'global' => [
            'url' => null,
        ],
        'china' => [
            'url' => 'https://t.me/joinchat/DqaGFT38xc6GeBTZvroruw',
        ],
    ],
    'fedora' => [
        'global' => [
            'url' => 'https://t.me/fedora',
        ],
        'china' => [
            'url' => 'https://t.me/fedorazh',
        ],
    ],
    'manjaro' => [
        'global' => [
            'url' => 'https://t.me/Manjaro',
        ],
        'china' => [
            'url' => null,
        ],
    ],
    'opensuse' => [
        'global' => [
            'url' => 'https://t.me/openSUSE_group',
        ],
        'china' => [
            'url' => 'https://t.me/opensuse_cn',
        ],
    ],
    'ubuntu' => [
        'global' => [
            'url' => 'https://t.me/openSUSE_group',
        ],
        'china' => [
            'url' => 'https://t.me/opensuse_cn',
        ],
    ],
];

foreach ($telegram_data as $distro => $groups) {
    foreach ($groups as $region => $group_data) {
        if ($group_data['url']) {
            $html = file_get_contents($group_data['url']);
            preg_match('/([\ 0-9]+)\smembers/', $html, $matches);
            $telegram_data[$distro][$region]['members'] = intval(str_replace(' ', '', $matches[1]));
        } else {
            $telegram_data[$distro][$region]['members'] = 0;
        }
    }
}

$data['telegram'] = $telegram_data;
