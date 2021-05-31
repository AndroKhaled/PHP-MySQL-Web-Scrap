<?php
include_once('simple_html_dom.php');

// function scraping_arabmediasociety()
// {
//         $html = file_get_html('https://www.arabmediasociety.com/category/features/');
//         $ret['Title'] = $html->find('title', 0)->innertext;
//     for($j =1;$j<=5;$j++)
//     {
//         $html = file_get_html('https://www.arabmediasociety.com/category/features/page/'.$j);
        
//         //for($i =0;$i<=6;$i++)
//         $i=0;
//         foreach($html->find('article[class="item-list"]') as $div) {
//             $ret['title: '.$i.$j] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->innertext;
//             $ret['article: '.$i.$j] = $div->find('div[class="entry"]',0)->find('p',0) ->innertext;
//             $ret['link: '.$i.$j] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->href;
//             $i++;  
//         }
//     }
//     $html->clear();
//     unset($html);
//     return $ret;
//     }

//--------------------------------------------------------------------------------------------


// function scraping_mklat(){
//     $html = file_get_html('https://www.mklat.com/category/technology/computer-internet/');
//     $ret['Title'] = $html->find('title', 0)->innertext;
// for($j =1;$j<=1;$j++)
// {
//     $html = file_get_html('https://www.mklat.com/category/technology/computer-internet/page/'.$j);
//     //for($i =0;$i<=6;$i++)
//     $i=0;
//     foreach($html->find('div[class="post-details"]') as $div) {
//         $ret['title: '.$i.$j] = $div->find('h2[class="post-title"]',0)->find('a',0)->innertext;
//         $ret['article: '.$i.$j] = $div->find('p[class="post-excerpt"]',0)->innertext;
//         $ret['link: '.$i.$j] = $div->find('h2[class="post-title"]',0)->find('a',0)->href;
//         $i++;  
//     }
// }
// $html->clear();
// unset($html);
// return $ret;
// }

// $ret = scraping_mklat();
//$ret = scraping_arabmediasociety();

$i=$u=$k=0;
for($j =1;$j<=5;$j++)
{
    $html = file_get_html('https://www.arabmediasociety.com/category/features/page/'.$j);
    //for($i =0;$i<=6;$i++)
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret1[$i] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->innertext;
        $i++;  
    }
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret2[$u] = $div->find('div[class="entry"]',0)->find('p',0) ->innertext;
        $u++;  
    }
    foreach($html->find('article[class="item-list"]') as $div) {
        $ret3[$k] = $div->find('h2[class="post-box-title"]',0)->find('a',0)->href;
        $k++;  
    }
}


for ( $a = 0 ; $a<sizeof($ret1) ; $a++)
{
    echo $a.'<strong>'.$ret1[$a].' </strong>'.'<br>';
}
?>