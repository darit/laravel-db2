<?php

namespace Cooperl\Database\DB2\Connectors;

/**
 * Class IBMConnector
 *
 * @package Cooperl\Database\DB2\Connectors
 */
class IBMConnector extends DB2Connector
{
    /**
     * @param array $config
     *
     * @return string
     */
    protected function getDsn(array $config)
    {
        $sslSecurity = '';
        if (env('DB_SSL', true)) {
            $sslSecurity = 'SECURITY=SSL;';
        }
        $dsn = "ibm:DRIVER={$config['driverName']};DATABASE={$config['database']};HOSTNAME={$config['host']};PORT={$config['port']};PROTOCOL=TCPIP;CurrentSchema={$config['schema']};" . $sslSecurity;

        return $dsn;
    }
}
