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
            $sslSecurity = 'SECURITY=SSL;SSLClientKeystoredb=db2_ssl_cli_keydb.kdb;SSLClientKeystash=db2_ssl_cli_keydb.sth;';
        }
        $dsn = "ibm:DRIVER={$config['driverName']};DATABASE={$config['database']};HOSTNAME={$config['host']};PORT={$config['port']};PROTOCOL=TCPIP;" . $sslSecurity;

        return $dsn;
    }
}
