@echo off

rem http://pcsupport.about.com/od/resources/fl/system-error-codes.htm
rem C:\Program Files (x86)\Windows Kits\10\Tools\x64\devcon.exe
rem devcon find * > C:\Bitnami\wampstack-7.0.0-0\apache2\htdocs\atx\devcon.txt

cd "C:\Program Files (x86)\Bluetooth Command Line Tools\bin"

rem   Change the following 2 lines to match your device
set DEVICE_ADDRESS=A4:C0:E1:2A:93:83
rem set SERVICE_UUID=1124

rem  If your device requires PIN code other than '0000', uncomment and change the following line
set PIN=0000

rem   Remove the device. Ignoring possible error here
btpair -u -b"%DEVICE_ADDRESS%"

rem   Pair the device
rem btpair -p%PIN% -b"%DEVICE_ADDRESS%"
btpair -p -b"%DEVICE_ADDRESS%"
if errorlevel 1 goto error

rem   Enable the service
rem btcom -c -b"%DEVICE_ADDRESS%" -s%SERVICE_UUID%
if errorlevel 1 goto error

goto success

rem   Allow user to read error message before window is closed
:error
pause
exit

:success
exit