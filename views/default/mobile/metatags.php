<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://kramnorth.com
 *
 */

if(mobile_detect()){
    
   echo  "<div align=\"center\" style=\"min-width:998px;width:100%; background-color:#666; height:20px; margin:auto;\"> <a href=\"/mod/mobile/desktop_unset.php\">" . elgg_echo("mobile:mobile") . "</a> | " .  elgg_echo("mobile:full")  . "</div>";
    
    }
  ?>