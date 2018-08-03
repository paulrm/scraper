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
                 echo $li->textContent . "\n";
                 }
           echo "\n";
           }
}
?>
