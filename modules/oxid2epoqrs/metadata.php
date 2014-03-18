<?php

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'oxid2epoqrs',
    'title'        => 'Oxid2Epoqrs',
    'description'  => '',
    'thumbnail'    => '',
    'version'      => '1.0',
    'author'       => '',
    'extend'       => array(
        'az_epoq' => 'oxid2epoqrs/az_epoq_rs_az_epoq',
        'az_epoq_catalog' => 'oxid2epoqrs/az_epoq_rs_az_epoq_catalog',
        'oxarticle' => 'oxid2epoqrs/az_epoq_rs_oxarticle',
        'oxbasket' => 'oxid2epoqrs/az_epoq_rs_oxbasket',
        'oxcmp_utils' => 'oxid2epoqrs/az_epoq_rs_oxcmp_utils',
        'oxorder' => 'oxid2epoqrs/az_epoq_rs_oxorder',
        'oxoutput' => 'oxid2epoqrs/az_epoq_rs_oxoutput',
        'oxsearch' => 'oxid2epoqrs/az_epoq_rs_oxsearch',
        'oxshop' => 'oxid2epoqrs/az_epoq_rs_oxshop',
        'oxuser' => 'oxid2epoqrs/az_epoq_rs_oxuser'
    )
);