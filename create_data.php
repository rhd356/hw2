<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <?php
        //making an array to store the first names in the file
        echo "First Name" //printing header
        echo '<pre>';
        //changing csv file into an array
        $firstName = fopen('first_names.csv','r');
        while (($line = fgetcsv($firstName)) !== FALSE) {
            //$line is an array of the csv elements
            print_r($line);
            }
            fclose($firstName);
            echo '</pre>';
        //making an array to store the last names in the file
            $lastName = file('last_names.txt');
            echo "Last Name"; //printing header
            echo '<pre>';
            print_r($lastName);
            echo '</pre>';
        //making an array to store the street names in the file
            $streetName = file('street_names.txt');
            echo "Street Name"; //printing header
            echo '<pre>';
            print_r($streetName);
            echo '</pre>';
        //making an array to store the street type in the file
            $streetType = file('street_types.txt');
            echo "Street Type"; //printing header
            echo '<pre>';
            print_r($lastName);
            echo '</pre>';
        //making an array to store the domain in the file
            $domainFile = file('domains.txt'); //printing header
            echo "Domain";
            echo '<pre>';
            print_r($domainFile);
            echo '</pre>';
        //domain field
        //

        //storing fields as arrays

            ?>

    </body>
</html>
