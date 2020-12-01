<?php
/** set your paypal credential **/

$config['client_id'] = 'ARnWj8U3URviMnlHmbD86k8_-woLBITyqk7VIznHSOiYwd635UuiDzZQbZFmMTXc1pN-Nf2Ry7TQ4vIl';
$config['secret'] = 'EJwhP-7FilbpdLOo1KMskZmvornuzOfmfmkwRRdixP_do_mmEFzQnr64hoAYhn8u5mZhnpeW5tk3kxop';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);
