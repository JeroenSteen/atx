start "" "C:\Bitnami\wampstack-7.0.0-0\manager-windows.exe"

start "" "C:\Program Files\Sublime Text 2\sublime_text.exe"

%SystemRoot%\explorer.exe "C:\Bitnami\wampstack-7.0.0-0\apache2\htdocs\atx"

start chrome "http://localhost:8088/atx/"
start chrome "http://localhost:8088/phpmyadmin/"
start chrome "https://github.com/JeroenSteen/atx"
start chrome "https://confluence.hro.nl/display/CMIP/0867254+-+ATX+-+Jeroen+van+der+Steen"

start "" "C:\Program Files (x86)\Arduino\arduino.exe"

cd "C:\Bitnami\wampstack-7.0.0-0\apache2\htdocs\atx"
start "" "C:\Program Files\Git\git-bash.exe"

start "" "%windir%\system32\notepad.exe"

:: PAUSE