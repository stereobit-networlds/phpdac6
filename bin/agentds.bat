@echo off
path=%path%;\php\;\GitHub\phpdac6

cd \GitHub\phpdac6\bin
php.exe agentds.exe.php %1 %2 %3
cd \php\bin
