<?php

$domain = getenv('LDAP_DOMAIN');
$ldapconfig['host'] = getenv('LDAP_HOST');
$ldapconfig['port'] = getenv('LDAP_PORT');
$ldapconfig['basedn'] = getenv('LDAP_BASEDN');

// Active Directory user group
$ldap_user_group = "HR";

// Active Directory manager group
$ldap_manager_group = "MIS";


$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);


?>
