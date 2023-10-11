<?php

$array_string = '{
    "custom": [
      {
        "type": "parent",
        "id": 1
      },
      {
        "type": "children",
        "id": 2,
        "data": "Hallo Im Apple",
        "parent_id": 1
      },
      {
        "type": "parent",
        "id": 3
      },
      {
        "type": "children",
        "id": 4,
        "data": "Hallo Im Orange",
        "parent_id": 3
      },
      {
        "type": "children",
        "id": 5,
        "data": "Hallo Im Banana",
        "parent_id": 3
      },
      {
        "type": "children",
        "id": 6,
        "data": "Hallo Im Human",
        "parent_id": null
      }
    ]
  }';


$array = json_decode($array_string, true);
$customs = $array['custom'];

$items = array();
foreach ($customs as $item) {
    if (($item['type'] === 'parent') || ($item['parent_id'] === null)) {
        $items[] = $item;
    }

    if ($item['type'] === 'children' && ($item['parent_id'] !== null)) {
        $pos = array_search($item['parent_id'], array_column($items, 'id'));
        $items[$pos][] = $item;
    }
}

$customs = array(
    'custom' => $items,
);

print_r($customs);