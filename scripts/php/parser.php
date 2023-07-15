<?php 
    function parsemd($filename){
        $content = file_get_contents($filename);
        $content = explode("\n", $content);
        $h1 = '/##.*/';
        $result = "";
        foreach($content as &$val){
            if(preg_match($h1, $val)){
                $result = $result.'<h1 class="md">'.preg_replace('/##/', '', $val, 1).'</h1>';
            }
            else if (preg_match('/<img.*/', $val)) {
                $imgid = explode('"', explode('<img id="', $val)[1])[0];
                $result = $result.preg_replace('/id=".+"/','src="/cdn/'.$imgid.'.png" class="md"', $val);
            }
            else {
                $result = $result.'<p class="md">'.$val.'</p>';
            }
        }
        unset($val);
        return $result;
    }
?>