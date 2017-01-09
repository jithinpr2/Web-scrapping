/**
@author: Jithin Pradeep
@mail : jithinpr2@gmail.com
*/
<?php
error_reporting(E_ERROR);
function parse_html_document($content)
 {


 $dom = new DOMDocument;
 @$dom->loadHTML($content);
 $html_tags=$dom->getElementsByTagName('html');
  $content="";

foreach($html_tags as $h)
             {

                 foreach($h->childNodes as $c)
                          {

                           //echo "TAG NAME:".$c->tagName."<br/>";
                           //echo "NODE VALUE:".$c->nodeValue."<br/>";
                           if($c->tagName=='head')
                             {
                                 foreach($c->childNodes as $hc)
                                       {
                                          if($hc->tagName=='meta'&&($hc->getAttribute('name')=='keywords'||$hc->getAttribute('name')=='description'))
                                             {

                                               $content.=" ".$hc->getAttribute('content');
                                                //echo "TAG NAME:".$hc->tagName."<br/>";
                                                //echo "NODE VALUE:".$hc->getAttribute('content')."<br/>";

                                             }

                                         else if($hc->tagName!='script'&&$hc->tagName!='style'&&$hc->tagName!=''&&$hc->tagName!='meta'&&$hc->tagName!='link')
                                               {
                                               $content.=" ".$hc->nodeValue;
                                               //echo "TAG NAME:".$hc->tagName."<br/>";
                                               //echo "NODE VALUE:".$hc->nodeValue."<br/>";
                                               }
                                       }
                             }


                           else if($c->tagName=='body')
                             {
                                 /*foreach($c->childNodes as $bc)
                                       {
                                         if($bc->tagName!='script'&&$bc->tagName!='style'&&$bc->tagName!='')
                                          {
                                           $content.=" ".$bc->nodeValue;
                                            // echo "TAG NAME:".$bc->tagName."<br/>";
                                             //echo "NODE VALUE:".$bc->nodeValue."<br/>";
                                          }
                                       }
                                 */
                                 $content.=" ".$c->nodeValue;
                             }
                             else if($c->tagName!='script'&&$c->tagName!='style'&&$c->tagName!='')
                               {
                                $content.=" ".$c->nodeValue;
                                     //echo "TAG NAME:".$c->tagName."<br/>";
                                     //echo "NODE VALUE:".$c->nodeValue."<br/>";
                               }

                          }

             }
return($content);
}
?>
