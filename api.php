<?php

class runShell{
//🚀基础指令
public $ls='sudo ls';
public $infoHeight = 'sudo docker exec miner miner info height';
public $peerBooks='sudo docker exec miner miner peer book -s';
public $dockerStats='sudo docker stats --no-stream';
public $dockerPs='sudo docker ps';
public $dockerInfo='sudo docker info';
public $Ip='sudo ip a';

//🚀状态指令
public $dockerBasicStats='sudo docker inspect --format "{{.State.Running}}" miner';
public $dockerBasicPort='sudo docker inspect --format \'{{println}}{{range $p,$conf := .NetworkSettings.Ports}}{{$p}} -> {{(index $conf 0).HostPort}}{{println}}{{end}}\' miner';
public $paketStatus='sudo pgrep lora_pkt_+';
public $getpaketinfo='sudo docker exec miner cat /var/data/log/console.log';
public $packetforwardruninglog='sudo cat /var/www/html/py/logs/packet.log';
public $dockerLog='sudo docker exec miner cat /var/data/log/console.log';
public $getGps='sudo bash /var/www/html/py/getGps.sh';
public $getGpsStatus='sudo timeout 2 python /var/www/html/py/gps.py';
public $getECC608='sudo i2cdump -y 0 0x64';
public $testECC608A='sudo /home/pi/hnt/ecc608/release/gateway_mfr --path /dev/i2c-0 test';
public $keyECC608A='sudo /home/pi/hnt/ecc608/release/gateway_mfr --path /dev/i2c-0 key 0';
public $readOnboarding="sudo cat /home/pi/hnt/miner/public_keys";
public $peerOnboarding="docker exec miner miner peer addr";
public $print_keys = "sudo docker exec miner miner print_keys";
public $ConfigStatus="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config ping";
public $ConfigOn="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config start";
public $ConfigOff="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config stop";
public $AdvertiseStatus="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config advertise status";
public $AdvertiseOn="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config advertise on";
public $AdvertiseOff="sudo /home/pi/config/_build/prod/rel/gateway_config/bin/gateway_config advertise off";
public $RemotHelpStatus="sudo netstat -anp|grep 8002|awk '{printf $7}'|cut -d/ -f1";

//🚀操作指令
public $stopMiner='sudo poweroff';
public $rebootMiner='sudo reboot';
public $startDocker='sudo docker start miner';
public $stopDocker='sudo docker stop miner';
public $restartDocker='sudo docker restart miner';
public $stopPacket='sudo kill -9 ';
public $startPacket='sudo bash /var/www/html/py/packet.sh >>/var/www/html/py/logs/packet.log 2>&1';
public $restarPacket='';
public $powerGps='';
public $stopPowerGps='';
public $enableGpsPower='sudo bash /var/www/html/py/gpsLoad.sh';


public function run($cmd){
 return shell_exec("$cmd");
}
/**
 * 🍺获取内网IP
 */
public function getIp(){
    $Ip='sudo ip a';
   
    $rawData = shell_exec($Ip);
    
    $cut_1=explode("eth0:",$rawData);
   
    $cut_2=explode('/24',$cut_1[1]);
   
    $cut_3=explode('.',$cut_2[0]);
    
    $cut_4=array_slice($cut_3,-4);

    $go_cut=explode(' ',$cut_4[0]);

    $ipa=array_slice($go_cut,-1);
    $cut_4[0]=$ipa[0];
    $ret=$cut_4;
   $ipaddr='';
    foreach($ret as $value){
        $ipaddr=$ipaddr.$value.'.';
    }
    return($ipaddr);
}
/**
 * 🍺进场杀死
 */
public function killProcess($pid){
$ret = exec('sudo kill '.$pid);
return $pid.'had been killed';
}
}

?>