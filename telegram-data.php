<?php

$telegram_data = [
    'arch' => [
        'global' => [
            'id' => 'archlinuxgroup',
        ],
        'china' => [
            'id' => 'archlinuxcn_group',
        ],
    ],
    'debian' => [
        'global' => [
            'id' => null,
        ],
        'china' => [
            'id' => 'joinchat/DqaGFT38xc6GeBTZvroruw',
        ],
    ],
    'fedora' => [
        'global' => [
            'id' => 'fedora',
        ],
        'china' => [
            'id' => 'fedorazh',
        ],
    ],
    'opensuse' => [
        'global' => [
            'id' => 'openSUSE_group',
        ],
        'china' => [
            'id' => 'opensuse_cn',
        ],
    ],
    'ubuntu' => [
        'global' => [
            'id' => 'openSUSE_group',
        ],
        'china' => [
            'id' => 'opensuse_cn',
        ],
    ],
];

foreach ($telegram_data as $distro => $groups) {
    foreach ($groups as $region => $group_data) {
        if ($group_data['id']) {
            $html = file_get_contents('https://t.me/' . $group_data['id']);
            preg_match('/([\ 0-9]+)\smembers/', $html, $matches);
            $telegram_data[$distro][$region]['members'] = intval(str_replace(' ', '', $matches[1]));
        }
    }
}

$data['telegram'] = $telegram_data;
