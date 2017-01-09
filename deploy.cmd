#!/bin/bash

echo $0
dirname $0

SCRIPTPATH=$( cd $(dirname $0) ; pwd -P )
echo $SCRIPTPATH

if [ -d /var/www/html ]
then
    ls -al /var/www/html
    rm -rf /var/www/html/CSS
    rm -rf /var/www/html/PHP
    cp -r $SCRIPTPATH/index.html /var/www/html/index.html
    cp -r $SCRIPTPATH/CSS /var/www/html/CSS
    cp -r $SCRIPTPATH/PHP /var/www/html/PHP
else
    printf "%s does not exist\n" /var/www/html
fi

# copy directory command
# code for simple copy.
# cp -r ./SourceFolder ./DestFolder
# code for copy with success result
# cp -rv ./SourceFolder ./DestFolder
# code for Forcefully if contain any readonly file it will also cpy
# cp -rf ./SourceFolder ./DestFolder
# derails help
# cp --help
