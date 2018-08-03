<?PHP
$html=file_get_contents("departamentos.html");
# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('ul') as $link) {
        # Show the <a href>
        if( $link->getAttribute('data-category') =="alquiler")
           {
           #print_r($link);
           foreach($link->childNodes as $li)
                 {
                 #echo "---->" . $li->textContent . "<---\n";
                 $linea=trim($li->textContent);
                 if(strlen($linea)>0)
                    processLine($linea);
                 }
           #echo "\n";
           }
}

function processLine($linea) {
   $parts=array();
   $n=preg_match_all( '/\$/', $linea, $parts );
   if($n==1)
      {
      $precio="";  
      $words=explode(" ",$linea);
      #print_r($words);
      foreach($words as $word) 
          {
          if(substr($word,0,1)=='$')
              $precio=$word;
          }
      echo '"' . $linea . '", "' . $precio . '"' . "\n";
      }
   else
      echo '"' . $linea . '", "' . "" . '"' . "\n";
}

?>
