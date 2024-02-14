<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>
    <body>
        <?php
        //making an array to store the first names in the file
            $firstName = file('first_names.csv');
            echo "First Name";
            echo '<pre>';
            print_r($firstName);
            echo '</pre>';
        //making an array to store the last names in the file
            $lastName = file('last_names.txt');
            echo "Last Name";
            echo '<pre>';
            print_r($lastName);
            echo '</pre>';
        //making an array to store the street names in the file
            $streetName = file('street_names.txt');
            echo "Street Name";
            echo '<pre>';
            print_r($streetName);
            echo '</pre>';
        //making an array to store the street type in the file
            $streetType = file('street_types.txt');
            echo "Street Type";
            echo '<pre>';
            print_r($lastName);
            echo '</pre>';
        //making an array to store the domain in the file
            $domainFile = file('domains.txt');
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
