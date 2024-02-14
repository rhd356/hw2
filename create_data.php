<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <?php
    //making an array to store the first names in the file
    echo "First Name"; //printing header
    echo '<pre>';
    //changing csv file into an array
    $firstName = fopen('first_names.csv','r',);
    while (($line = fgetcsv($firstName)) !== FALSE) {
        //$line is an array of the csv elements
        print_r($line);
        }
        fclose($firstName);
        echo '</pre>';

//making an array to store the last names in the file
    $lastName = file('last_names.txt', FILE_IGNORE_NEW_LINES);
    echo "Last Name";
    echo '<pre>';
    print_r($lastName);
    echo '</pre>';

//making an array to store the street names in the files
    $streetName = file('street_names.txt', FILE_IGNORE_NEW_LINES);
    $streetNameArray = array();

    //breaking up the array after each ":" to make each word its own index
    foreach ($streetName as $line) {
        $types = explode(':', $line);
        foreach ($types as $type) {
            // Trim any leading or trailing whitespace
            $type = trim($type);
            // Add the type to the array if it's not empty
            if (!empty($type)) {
                $streetNameArray[] = $type;
            }
        }
    }
    echo "Street Name"; //printing header
    echo '<pre>';
    print_r($streetNameArray);
    echo '</pre>';

//making an array to store the street type in the file
    $streetType = file('street_types.txt', FILE_IGNORE_NEW_LINES);
    $streetTypesArray = array();

    //breaking up the array after each "..;" to make each word its own index
    foreach ($streetType as $line) {
        $types = explode('..;', $line);
        foreach ($types as $type) {
            // Trim any leading or trailing whitespace
            $type = trim($type);
            // Add the type to the array if it's not empty
            if (!empty($type)) {
                $streetTypesArray[] = $type;
            }
        }
    }
    echo "Street Type";     // Print the street types array
    echo '<pre>';
    print_r($streetTypesArray);
    echo '</pre>';

//making an array to store the domain in the file
    $domainFile = file('domains.txt');
    $domainFileArray = array();

    //breaking up the array after each period to make each domain its own index 
    foreach ($domainFile as $line) {
        $types = explode('.', $line);
        foreach ($types as $type) {
            // Trim any leading or trailing whitespace
            $types = trim($type);
            // Add the type to the array if it's not empty
            if (!empty($type)) {
                $domainFileArray[] = $type;
            }
        }
    }
    //combining the domain name and ".com"
    $combinedDomains = array();
    for ($i = 0; $i < count($domainFileArray); $i += 2) {
        $combinedDomain = $domainFileArray[$i];
        if (isset($domainFileArray[$i + 1])) {
            $combinedDomain .= '.' . $domainFileArray[$i + 1];
        }
        $combinedDomains[] = $combinedDomain;
    }
    // Print the combined domain names
    echo "Domain";
    echo '<pre>';
    print_r($combinedDomains);
    echo '</pre>';

?>
</body>
</html>
