<?php
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = postgres";
   $credentials = "user = postgres password=joseph";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      CREATE TABLE userProfiles
      (userid SERIAL PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      LASTNAME       INT     NOT NULL,
      EMAIL        CHAR(50),
      PASSWORD       CHAR(50));
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "userProfiles table created successfully\n";
   }

    $sql =<<<EOF
      CREATE TABLE files
      (userid INT PRIMARY KEY,
      file           CHAR(50),
      CPU            INT,
      RAM            INT,
      ELAPSED        INT,
      POWER          INT,
      HEAT           INT,
      );
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "FILE Table created successfully\n";



   pg_close($db);
?>