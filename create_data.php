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
    $firstNames = [];
    $firstNameFile = fopen('first_names.csv','r',);
    while (($line = fgetcsv($firstNameFile, 0, ",")) !== FALSE) {
        //$line is an array of the csv elements
        print_r($line);
        $firstNames = $line;
        }
        fclose($firstNameFile);
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

    // randomizes arrays and generates 25 entries
    $customers = [];
    for ($i = 0; $i < 25; $i++) {
        $firstNameKey = array_rand($firstNames);
        $lastNameKey = array_rand($lastName);
        $domainKey = array_rand($combinedDomains);
        $streetNameKey = array_rand($streetNameArray);
        $streetTypeKey = array_rand($streetTypesArray);

        // combines first name, last name and street name from the randomized array
        $uniqueIdentifier = $firstNameKey . $lastNameKey . $streetNameKey;
        // ensures that all entries are unique and concatenates email entries based on names. Adds house number to address, random number from 1 to 999
        if (!array_key_exists($uniqueIdentifier, $customers)) {
            $customers[$uniqueIdentifier] = [
                'firstName' => $firstNames[$firstNameKey],
                'lastName' => $lastName[$lastNameKey],
                'email' => strtolower($firstNames[$firstNameKey] . '.' . $lastName[$lastNameKey] . '@' . $combinedDomains[$domainKey]),
                'address' => rand(1, 999) . ' ' . $streetNameArray[$streetNameKey] . ' ' . $streetTypesArray[$streetTypeKey]
            ];
    }
}

    // Creates a table to display customer data in create_data.php page
    echo "<table border='1'><tr><th>First Name</th><th>Last Name</th><th>Address</th><th>Email</th></tr>";
    foreach ($customers as $customer) {
        echo "<tr><td>{$customer['firstName']}</td><td>{$customer['lastName']}</td><td>{$customer['address']}</td><td>{$customer['email']}</td></tr>";
    }
    echo "</table>";

    // Write customers to a file called "txt.txt"
    $fileHandle = fopen("txt.txt", "w");
    foreach ($customers as $customer) {
        $lineToWrite = "{$customer['firstName']}:{$customer['lastName']}:{$customer['address']}:{$customer['email']}\n";
        fwrite($fileHandle, $lineToWrite);
    }
    fclose($fileHandle);
    ?>
</body>
</html>
