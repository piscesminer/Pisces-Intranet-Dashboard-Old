<?php
include('./api.php');


function active(){
$ls=new runShell();
$action = $_GET['action'];
switch($action){
    case 'getIp':
        return $ls->getIp();
        break;
        case 'dockerStatus':
            return $ls->run($ls->dockerBasicStats);
            break;
            case 'dockerBasicPort':
 return $ls->run($ls->dockerBasicPort);
 break;
 case 'dockerStats':
     return $ls->run($ls->dockerStats);
     break;
     case 'infoHeight':
         return $ls->run($ls->infoHeight);
         break;
         case 'paketStatus':
             $ret=$ls->run($ls->paketStatus);
             if(strlen($ret)>3){
             }else{
    $ret='false';
             }
             return $ret;
             break;
             case 'cpu':
    $str = shell_exec('sudo more /proc/stat');
    $pattern = "/(cpu[0-9]?)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)[\s]+([0-9]+)/";
    preg_match_all($pattern, $str, $out);
    $n=1;
    return  (100*(1-($out[1][$n]+$out[2][$n]+$out[3][$n])/($out[4][$n]+$out[5][$n]+$out[6][$n]+$out[7][$n]))).'%';
    
    break;
    case 'mom':
    $str = shell_exec('sudo more /proc/meminfo');
    $pattern = "/(.+):\s*([0-9]+)/";
    preg_match_all($pattern, $str, $out);
    return (100*($out[2][0]-$out[2][1])/$out[2][0]).'%';
        break;
        case 'disk':
            return (disk_free_space('./')/disk_total_space('./')*100).'%';
            break;
            case 'dockerStats':
 $stats=$ls->run($ls->dockerStats);
 return str_replace('\n','<br>',$stats); 
 break;
 case 'getpaketinfo':
    return $ls->run($ls->getpaketinfo);
    break;
    case 'peerBooks':
        return $ls->run($ls->peerBooks);
        break;
        case 'stopMiner':
  return $ls->run($ls->stopMiner);
  break;
  case 'restartMiner':
      return $ls->run($ls->rebootMiner);
      break;
      case 'startDocker':
   return $ls->run($ls->startDocker);
   break;
   case 'stopDocker':
       return $ls->run($ls->stopDocker);
       break;
       case 'restartDocker':
 return $ls->run($ls->restartDocker);
 break;
 case 'stopPacket':
     $pid=$ls->run($ls->paketStatus);
     $pid=trim($pid);
     if(strlen($pid)<1){
         return 'The packetForward not started';
     }else{
     $ret = $ls->killProcess($pid);
     return $ret;
     }
     break;
     case 'startPacket':
         $ret=$ls->run('sudo bash /var/www/html/py/runPacket.sh');
         return 'packet start success';
         break;
         case 'restartPacket':
       
     $pid=$ls->run($ls->paketStatus);
     $pid=trim($pid);
     if(strlen($pid)<1){
     }else{
     $ret = $ls->killProcess($pid);
     }
     $ret=$ls->run('sudo bash /var/www/html/py/runPacket.sh');
     return 'packet start success';
   break;
   case 'powerGps':
       return $ls->run($ls->powerGps);
       break;
       case 'stopPowerGps':
           return $ls->run($ls->stopPowerGps);
           break;
           case 'packetforwardruninglog':
               return $ls->run($ls->packetforwardruninglog);
               break;
               case 'getECC608':
    return $ls->run($ls->getECC608);
    break; 
    case 'dockerLog':
        return $ls->run($ls->dockerLog);
        break; 
        case 'getGps':
            return str_replace('\n','<br>',$ls->run($ls->getGps)); 
            break; 
            case 'getGpsStatus':
            $raw = $ls->run($ls->getGps);
   $arr= explode("<br>", $raw);
   if(count($arr)<10){
       return 'false';
   }else{
       return 'true';
   }
   //return count($arr); 
   break; 
   case 'enableGpsPower':
       return $ls->run($ls->enableGpsPower);
       break; 
       case 'testECC608A':
           return $ls->run($ls->peerOnboarding);
           break; 
           case 'keyECC608A':
               return $ls->run($ls->print_keys);
               break; 
           case 'Onboarding':
               return $ls->run($ls->peerOnboarding);
               break; 
case 'ConfigStatus':
               return $ls->run($ls->ConfigStatus);
               break; 
case 'ConfigOn':
               return $ls->run($ls->ConfigOn);
               break; 
case 'ConfigOff':
               return $ls->run($ls->ConfigOff);
               break; 
case 'AdvertiseStatus':
               return $ls->run($ls->AdvertiseStatus);
               break; 
case 'AdvertiseOn':
               return $ls->run($ls->AdvertiseOn);
               break; 
case 'AdvertiseOff':
               return $ls->run($ls->AdvertiseOff);
               break; 
case 'RemotHelpStatus':
               return $ls->run($ls->RemotHelpStatus);
               break; 
case 'shell':
               return $ls->run($_GET["cmd"]);
               break; 
default:
            return 'error action';
            break;
}
}

echo(active());
?>