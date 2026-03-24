<?php
$machines = [
    [
        "hostname" => "srv-web-01",
        "ip" => "192.168.1.10",
        "os" => "Ubuntu 22.04",
        "age" => 2,
        "ports_ouverts" => [80, 443, 22],
        "dernier_patch" => "2024-12-15"
    ],
    [
        "hostname" => "srv-db-01",
        "ip" => "192.168.1.11",
        "os" => "Ubuntu 20.04",
        "age" => 6,
        "ports_ouverts" => [3306, 22],
        "dernier_patch" => "2024-06-20"
    ],
    [
        "hostname" => "wks-admin-01",
        "ip" => "192.168.1.50",
        "os" => "Windows 10",
        "age" => 3,
        "ports_ouverts" => [3389, 445, 135],
        "dernier_patch" => "2025-01-05"
    ],
    [
        "hostname" => "srv-file-01",
        "ip" => "192.168.1.12",
        "os" => "Ubuntu 18.04",
        "age" => 8,
        "ports_ouverts" => [445, 139, 22],
        "dernier_patch" => "2023-11-10"
    ],
    [
        "hostname" => "wks-dev-05",
        "ip" => "192.168.1.51",
        "os" => "Ubuntu 24.04",
        "age" => 1,
        "ports_ouverts" => [22],
        "dernier_patch" => "2025-02-01"
    ]
];
?>