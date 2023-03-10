<?php

namespace  System\View\Traits;

trait HasIncludeContent{

    private function checkIncludesContent()
    {
       while(1)
       {
           $includesNamesArray = $this->findIncludesNames();
           if(!empty($includesNamesArray)){
               foreach($includesNamesArray as $includeName){
                   $this->initialIncludes($includeName);
               }
           }
           else{
           break;
           }
       }
    }

    private function findIncludesNames()
    {
        $includesNamesArray = [];
       preg_match_all("/@include+\('([^)]+)'\)/", $this->content, $includesNamesArray);
       return isset($includesNamesArray[1]) ? $includesNamesArray[1] : false;
    }

    private function initialIncludes($includeName)
    {
        $this->content = str_replace("@include('$includeName')", $this->viewLoader($includeName), $this->content);
    }
}