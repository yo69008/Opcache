<?php

namespace OpcacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class OpcacheController extends Controller
{
    /**
     * @Route("/opcache", name="opcache")
     */
    public function opcacheAction(Request $request)
    {
        $cfg = opcache_get_status();
        
        return $this->render(
            '@OpcacheBundle/Resources/views/opcache.html.twig', [
                "title"=>"OPcache info",
                "free"=>round($cfg["memory_usage"]["free_memory"] / 1000 / 1000, 2)  .  " MB",
                "percentfree"=>round($cfg["memory_usage"]["free_memory"]/($cfg["memory_usage"]["free_memory"]+$cfg["memory_usage"]["used_memory"]+$cfg["memory_usage"]["wasted_memory"])*100,1),
                "used"=>round($cfg["memory_usage"]["used_memory"] / 1000 / 1000, 2) . " MB",
                "percentused"=>round($cfg["memory_usage"]["used_memory"]/($cfg["memory_usage"]["free_memory"]+$cfg["memory_usage"]["used_memory"]+$cfg["memory_usage"]["wasted_memory"])*100,1),
                "wasted"=>round($cfg["memory_usage"]["wasted_memory"] / 1000 / 1000, 2) . " MB",
                "wastedpercent"=>round($cfg["memory_usage"]["wasted_memory"]/($cfg["memory_usage"]["free_memory"]+$cfg["memory_usage"]["used_memory"]+$cfg["memory_usage"]["wasted_memory"])*100,1),
                "freekeys"=> $cfg["opcache_statistics"]["max_cached_keys"]- $cfg["opcache_statistics"]["num_cached_keys"],
                "percentfreekeys"=>round(($cfg["opcache_statistics"]["max_cached_keys"]- $cfg["opcache_statistics"]["num_cached_keys"])/$cfg["opcache_statistics"]["max_cached_keys"]*100, 1),
                "usedkeys"=> $cfg["opcache_statistics"]["num_cached_keys"],
                "percentusedkeys"=> round($cfg["opcache_statistics"]["num_cached_keys"]/$cfg["opcache_statistics"]["max_cached_keys"]*100,1),
                "percenthit"=>round($cfg["opcache_statistics"]["hits"]/($cfg["opcache_statistics"]["hits"]+$cfg["opcache_statistics"]["misses"])*100, 1),
                "hit" => $cfg["opcache_statistics"]["hits"],
                "percentmiss"=>round($cfg["opcache_statistics"]["misses"]/($cfg["opcache_statistics"]["hits"]+$cfg["opcache_statistics"]["misses"])*100, 1),
				"miss" => $cfg["opcache_statistics"]["misses"],
                "Scripts" => $cfg["opcache_statistics"]["num_cached_scripts"],
                "script"=> $cfg["scripts"],
            ]
        );
    }
}
