Newzdash
========

NewzNab dashboard, based upon free Charisma bootstrap theme
	
    Based off original work titled 'Charisma' by Muhammad Usman
    Original Charisma license in doc/charisma-license.txt


NewzDash is a Dashboard application built for the newznab indexing software (newznab.com)

Installation Instructions

- clone the git repository: 'git clone git@github.com:tssgery/newzdash.git'
- withing newzdash directory, copy config.php.base file to config.php
- Edit config.php, setting the directory name of newznab installation and URL to access newznab
- Configure apache or nginx to server newzdash at port of your choosing (I prefer 8080)
- Access NewzDash via your browser at http://hostname:port


ToDo
- Add authentication to NewzDash, using users stored within newznab
- Add system information (such as memory and cpu consumption, and disk space)
- Enable newzdash version checking and automatic updates

Screens

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-dash.jpg)

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-recent.jpg)

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-stats.jpg)

