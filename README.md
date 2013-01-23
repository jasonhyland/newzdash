Newzdash
========

NewzNab dashboard, based upon free Charisma bootstrap theme
	
    Based off original work titled 'Charisma' by Muhammad Usman
    Original Charisma license in doc/charisma-license.txt


NewzDash is a Dashboard application built for the newznab indexing software (newznab.com)

Installation Instructions

1) clone the git repository: 'git clone git@github.com:tssgery/newzdash.git'
2) withing newzdash directory, copy config.php.base file to config.php
3) Edit config.php, setting the directory name of newznab installation and URL to access newznab
4) Configure apache or nginx to server newzdash at port of your choosing (I prefer 8080)
5) Access NewzDash via your browser at http://hostname:port


ToDo
- Add authentication to NewzDash, using users stored within newznab
- Add system information (such as memory and cpu consumption, and disk space)
- Enable newzdash version checking and automatic updates

