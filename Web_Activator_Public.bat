@echo off
set "filepath=%cd%"
echo Installing website
echo Deze window die blijft even "frozen" tuwel hij installatie uitvoert, als hij vanuit het niks sluit. Laat mij even weten want dan klopt er iets niet!
REM start /min /WAIT cmd.exe /k "cd %filepath% & composer require composer-runtime-api:^2.0 & exit"
start /min /WAIT cmd.exe /k "cd %filepath% & composer install & exit"
php artisan key:generate
php artisan migrate
start /min /WAIT cmd.exe /k "cd %filepath% & npm install & exit"
php artisan db:seed
echo --------------------
echo Installation Done!
echo Website activation was unsuccessful!
pause

