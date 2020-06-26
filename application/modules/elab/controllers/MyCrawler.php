<?php
include("libs/PHPCrawler.class.php"); 
Class MyCrawler extends  PHPCrawler
{ 
  public $stock;
  public $change;
    
  function Visit($irc_server){
// Open the connection
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $port = '80';
        $ch = curl_init();    // initialize curl handle
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_URL, $irc_server); 
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);          
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 50); 
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($ch, CURLOPT_PORT, $port);          

        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        if ($curl_errno > 0) {
              $return = ("cURL Error ($curl_errno): $curl_error\n");
        } else {
               $return = $data;
        }
        curl_close($ch);
         /*if($httpcode >= 200 && $httpcode < 300){
           $return = 'OK';
       }else{
            $return ='Nok';
        }*/

        return $return;

   }
  function handleDocumentInfo($DocInfo)  
  { 
    global $find;
    $find = array(
      array("word" => "Cập nhật lúc"),
      array("word" => "Khối lượng")      
      );
    // Just detect linebreak for output ("\n" in CLI-mode, otherwise "<br>"). 
    if (PHP_SAPI == "cli") $lb = "\n"; 
    else $lb = "<br />"; 

    // Print the URL and the HTTP-status-Code 
  //  echo "Page requested: ".$DocInfo->url." (".$DocInfo->http_status_code.")".$lb; 
    $i=0;
    foreach ($find as $matche) {
        $matchb = implode(',',$matche);
    //$matchb = $matche['word'];
        if(preg_match("/(".$matchb.")/i", $this->Visit($DocInfo->url))) { 
        //    echo "<a href=".$DocInfo->url." target=_blank>".$DocInfo->url."</a><b style='color:red;'>".$matche['word']."</b>".$lb;
            
            $i=$i+1;
            if ($i==1){
              $content=$this->Visit($DocInfo->url);
              $startStr=strpos($content, $matchb);
           //   echo  $startStr."<br />";
            }
            elseif(($i==2)){
               
              $stopStr=strpos($content, $matchb);
        //      echo  $stopStr."<br />";
              $string=substr($content,$startStr,$stopStr);
        //      echo $string."<br />";
              $pos1=strpos( $string, "(");
              $pos2=strpos( $string, ")");
       //       echo substr($string,$pos1+1,$pos2-$pos1-2);
             
          //    $this->change=round(21.4*(1+0.01*floatval(substr($string,$pos1+1,$pos2-$pos1-2))),1);
              $this->change=floatval(substr($string,$pos1+1,$pos2-$pos1-2));
             return;
            }            
            
        }
    }
   
     
    // Print if the content of the document was be recieved or not 
    /*if ($DocInfo->received == true) 
     echo "Content received: ".$DocInfo->bytes_received." bytes".$lb; 
    else 
      echo "Content not received".$lb;  */
     
    // Now you should do something with the content of the actual 
    // received page or file ($DocInfo->source), we skip it in this example  
     
 //   echo $lb; 
   /* $example = array('An example','Another example','Last example');
    $searchword = 'Cập nhật';
    $matches = array_filter($DocInfo, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var); });*/
 //   print_r($DocInfo->content);
   // echo $matches;
   // flush(); 
  }  
  function crawl_stock($data){
    $stock=$data;
    set_time_limit(10000); 
  	
  	// URL to crawl 
    $this->setURL($stock->link); 
  // $this->setURL("http://s.cafef.vn/hastc/PVS-tong-cong-ty-co-phan-dich-vu-ky-thuat-dau-khi-viet-nam.chn");
   
    

// Only receive content of files with content-type "text/html" 
	$this->addContentTypeReceiveRule("#text/html#"); 

// Ignore links to pictures, dont even request pictures 
	$this->addURLFilterRule("#\.(jpg|jpeg|gif|png)$# i"); 

// Store and send cookie-data like a browser does 
	$this->enableCookieHandling(true); 

// Set the traffic-limit to 1 MB (in bytes, 
// for testing we dont want to "suck" the whole site) 
	$this->setTrafficLimit(1000 * 1024); 

// Thats enough, now here we go 
	$this->go(); 

// At the end, after the process is finished, we print a short 
// report (see method getProcessReport() for more information) 
	$report = $this->getProcessReport(); 

	if (PHP_SAPI == "cli") $lb = "\n"; 
	else $lb = "<br />"; 
 //  print_r($report->bytes_received);
	// echo "Summary:".$lb; 
	// echo "Links followed: ".$report->links_followed.$lb; 
	// echo "Documents received: ".$report->files_received.$lb; 
	// echo "Bytes received: ".$report->bytes_received." bytes".$lb; 
	// echo "Process runtime: ".$report->process_runtime." sec".$lb;  
  
  }
  

}  
?>