
# install on windows tutorial:

1. open PowerShell as Administrator.  
2. run the following command to PowerShell  
Set-ExecutionPolicy RemoteSigned; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri "https://github.com/cretueusebiu/valet-windows/raw/master/bin/php73.ps1" -OutFile $env:temp\php73.ps1; .$env:temp\php73.ps1  
3. install composer https://getcomposer.org/download/  
4. composer global require consolidation/cgr  
5. cgr laravel/installer  
6. cgr cretueusebiu/valet-windows  
7. http://mayakron.altervista.org/wikibase/show.php?id=AcrylicWindows10Configuration  
    7.1 remember to diable the internet onece, and then enable it.   
8. valet install  
9. create a folder to store the project repo, then type
  valet install
  in PowerShell to install the package


fix bugs:
run the command in MySQL console.
1. The server requested authentication method unknown to the client  
    solution:  
    alter user 'root'@'localhost' identified with mysql_native_password by 'lizuofu8426;'
2.  Access denied for user 'ODBC'@'localhost' (using password: NO)  
    solution:  
    mysql -u root -p  
3.  sudo /usr/local/mysql/bin/mysqld_safe --skip-grant-tables

https://stackoverflow.com/questions/18339513/access-denied-for-user-root-mysql-on-mac-os

4.  access denied:
https://stackoverflow.com/questions/4359131/brew-install-mysql-on-macos

    4.1 remove MySQL by cleaning up everything.  
        brew remove mysql  
        brew cleanup  
        launchctl unload -w ~/Library/LaunchAgents/homebrew.mxcl.mysql.plist  
        rm ~/Library/LaunchAgents/homebrew.mxcl.mysql.plist  
        sudo rm -rf /usr/local/var/mysql
    4.2 start from scratch.
        brew install mysql  

        optional: [
        unset TMPDIR  
        mysql_install_db --verbose --user=`whoami` --basedir="$(brew --prefix mysql)" --datadir=/usr/local/var/mysql --tmpdir=/tmp   
        ]

        mysql.server start   

        # the following 5.5.10 will be replaced with the version the user downloaded.
        # use tab could automatically pop up the version
        /usr/local/Cellar/mysql/5.5.10/bin/mysql_secure_installation

        # start  
        launchctl load -w ~/Library/LaunchAgents/homebrew.mxcl.mysql.plist  

        # stop  
        launchctl unload -w ~/Library/LaunchAgents/homebrew.mxcl.mysql.plist  


        mysql -u root -p
