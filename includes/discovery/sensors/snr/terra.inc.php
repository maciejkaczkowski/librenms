<?php
    if (strpos($device["sysDescr"], "sti410C") !== false) {
        $oid     = ".1.3.6.1.4.1.30631.1.9.1.27.10.0";
        $snr = snmp_get($device, $oid, "-Ovq");
        $divisor = 10;
        $value   = snmp_get($device, $oid, "-Ovq") / $divisor;
        discover_sensor($valid['sensor'], "snr", $device, $oid, "0", "input", "RF Input", $divisor, '1', null, null, null, null, $value);
    }
    else if  (strpos($device["sysDescr"], "sti440") !== false) {
        for ($i = 1; $i < 5; $i++) {
            $oid     = ".1.3.6.1.4.1.30631.1.18.1.$i.5.0";
            $snr = snmp_get($device, $oid, "-Ovq");
            $divisor = 10;
            $value   = snmp_get($device, $oid, "-Ovq") / $divisor;
            discover_sensor($valid['sensor'], "snr", $device, $oid, $i, "input", "RF Input ".$i, $divisor, '1', null, null, null, null, $value);
        }
    }
?>
