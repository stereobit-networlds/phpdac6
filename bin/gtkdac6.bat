@echo off
path=%path%;\php\;\GitHub\phpdac6\gtk

php.exe -q \GitHub\phpdac6\gtk\start.gtk.php %1
rem php_win.exe -q \GitHub\phpdac6\gtk\start.gtk.php %1 %2
cd \phpdac5\bin
