@echo off
path=%path%;\php\;\GitHub\phpdac6

cd \GitHub\phpdac6
php.exe startup.dpc.php  -start %1 -run %2
cd \php\bin
