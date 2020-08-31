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
        $extra = '';
        if (env('DB_SSL', true)) {
            $sslSecurity = 'SECURITY=SSL;';
        }
        if (env('DB_SSL_CERT', false)) {
            $sslSecurity .= 'SSLServerCertificate='.env('DB_SSL_CERT').';';
        }
        if (env('DB_EXTRA', false)) {
            $extra = env('DB_EXTRA');
        }
        $dsn = "ibm:DRIVER={$config['driverName']};DATABASE={$config['database']};HOSTNAME={$config['host']};PORT={$config['port']};PROTOCOL=TCPIP;CurrentSchema={$config['schema']};" . $sslSecurity . $extra;

        return $dsn;
    }
}
