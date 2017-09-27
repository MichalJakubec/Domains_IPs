<!doctype html>
<html>
      <head>
            <title>Domains->IDs</title>
            <style>
            body{
                  background-color: #000000;
                  color: #00FF00;
		        }
            table{
                  border:1px solid #00FF00;
		        }
            td{
            width: 200px;
            text-align: center;
            }
            </style>
      </head>
      <body>
            <h1>Domains -> IPs</h1>
            <?php

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT']; //The document root directory under which the current script is executing, as defined in the server's configuration file.
$domains = $DOCUMENT_ROOT.'/Michal_Jakubec/PHP/Domains_IPs/domains.txt';
$lines = count(file($domains));

$file = fopen($domains, 'r');

$domains = array();

for($i = 1; $i <= $lines; $i++) {
    $line = fgets($file);    //Gets a line from file pointer.
    $value = trim($line); //trim — Strip whitespace (or other characters) from the beginning and end of a string
    array_push($domains, $value);   //Push one or more elements onto the end of array
}
foreach($domains as $domain)
{
   $ip = gethostbyname($domain);
   echo '<table><tr><td>'.$domain. '</td><td>' . $ip .'</td></tr></table>';
}
fclose($file);

            ?>
      </body>
</html>