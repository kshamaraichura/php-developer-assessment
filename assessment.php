<?php

/*
* DotDev - PHP Developer Test
* Author: Kshama Raichura
* Date Completed: 7/8/2018 2.30AM
* Time taken: 2h 0m
* Remarks:
*   - Modules
        (1) loadData: loading data into the variables customers, orders and order_items
        (2) getCustomerNameByID: Returns customer name for a given customer id
        (3) getOrderItemsByID: Return list of order items associated with a given order id
        (4) calculateTotal: Calculate the total for each order in orders set
        (5) printOrders: Outputs the order into Order format with optional details about order items
*   - Errors
*/

class StoreData
{
    private $customers;
    private $orders;
    private $order_items;

    function __construct()
    {
    }

    public function loadData()
    {
        $this->customers = [
            ['id' => 'BQYLCQ0CCwIOBgYNBAcACw', 'name' => 'Bob'],
            ['id' => 'CQwPDAkDDAQLBQsOBAcMBw', 'name' => 'Jan'],
            ['id' => 'AgsIBAsFAwYCCw8GBAINAQ', 'name' => 'Steve'],
            ['id' => 'DAEFDQwPDwMCCwULBAAMDg', 'name' => 'Fred'],
            ['id' => 'DQkCAAYHAAMJBA4LBAUOCg', 'name' => 'Robot']
        ];
        $this->orders = [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506476504],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506480104],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'customerId' => 'CQwPDAkDDAQLBQsOBAcMBw', 'dateOrdered' => 1506562904],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'customerId' => 'CgUDCQ8IDAsIBwUBBAgIAA', 'dateOrdered' => 1507081304],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'customerId' => 'AgsIBAsFAwYCCw8GBAINAQ', 'dateOrdered' => 1509068504],
            ['id' => 'CQALBwoDAw0AAQgHBAEJBQ', 'customerId' => 'DAEFDQwPDwMCCwULBAAMDg', 'dateOrdered' => 1538012504]
        ];
        $this->order_items = [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00, 'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55, 'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 90.00, 'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55, 'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 3.00, 'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55, 'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 15.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00, 'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55, 'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 32.00, 'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55, 'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
            ]
            ]
        ];
    }

    private function getCustomerNameByID($id)
    {
        foreach ($this->customers as $cust) {
            if ($cust['id'] == $id) {
                return $cust['name'];
            }
        }
        return null;
    }

    private function getOrderItemsByID($id)
    {
        foreach ($this->order_items as $oi) {
            if ($oi['id'] == $id) {
                return $oi['items'];
            }
        }
        return null;
    }

    private function calculateTotal($orders)
    {
        foreach ($orders as &$o) {
            $o['total'] = 0.0;
            foreach ($this->order_items as $oi) {
                if ($o['id'] == $oi['id']) {
                    $o['total'] = array_sum(array_column($oi['items'], 'value'));
                    break;
                }
            }
        }
        return $orders;
    }

    private function printOrders($orders, $details = true)
    {
        $formatOrder = array("orders" => array());
        foreach ($orders as $o) {
            $formatOrder["orders"][$o['id']] = array(
                'date' => $o['dateOrdered'],
                'total' => $o['total'],
                'customer' => array(
                    'id' => $o['customerId'],
                    'name' => $this->getCustomerNameByID($o['customerId'])
                )
            );
            if ($details) {
                $formatOrder["orders"][$o['id']]['order_items'] = $this->getOrderItemsByID($o['id']);
            }
        }
        return $formatOrder;
    }

    public function formatData($option)
    {
        // All data should be returned as formatted JSON.
        if ($option == 1) {
            // return orders sorted by highest value. Be sure to include the order total in the response
            $orders = $this->calculateTotal($this->orders);
            usort($orders, function ($item1, $item2) {
                return $item1['total'] <= $item2['total'];
            });
            return json_encode($this->printOrders($orders), JSON_PRETTY_PRINT);
        } elseif ($option == 2) {
            // return orders sorted by date
            $orders = $this->calculateTotal($this->orders);
            usort($orders, function ($item1, $item2) {
                return $item1['dateOrdered'] >= $item2['dateOrdered'];
            });
            return json_encode($this->printOrders($orders), JSON_PRETTY_PRINT);
        } elseif ($option == 3) {
            // return orders without items
            $orders = $this->calculateTotal($this->orders);
            return json_encode($this->printOrders($orders, false), JSON_PRETTY_PRINT);
        }
    }
}

$run = new StoreData();
$run->loadData();
$option = 0;
if (isset($argv[1])) {
    // Command line data is found
    $option = isset($argv[1]) ? $argv[1] : 0;
} else {
    // If requested from web browser
    $option = isset($_GET['option']) ? $_GET['option'] : 0;
}
echo $run->formatData($option);
