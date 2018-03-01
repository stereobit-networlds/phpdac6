@echo off
mode 80,60
mode con:cols=80 lines=400
rem line max 32766

color 5a
rem agentds -inetd

set ID="06"
echo I am in Command Shell
 >%temp%.\agent.ps1 echo Write-Host I am in Powershell
>>%temp%.\agent.ps1 echo $Var = "-inetd"
>>%temp%.\agent.ps1 echo Write-Host My ID: $env:Id, String: $Var
>>%temp%.\agent.ps1 echo cd d:\GitHub\phpdac6
>>%temp%.\agent.ps1 echo d:\php\php.exe .\startup.dpc.php -inetd %2 %3 %4
rem powershell.exe -noprofile %temp%.\agent.ps1
powershell.exe -executionpolicy remotesigned -noprofile %temp%.\agent.ps1
echo I returned to Command Shell

pause

