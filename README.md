Newzdash
========

NewzNab dashboard, based upon free Charisma bootstrap theme
	
    Based off original work titled 'Charisma' by Muhammad Usman
    Original Charisma license in doc/charisma-license.txt


NewzDash is a Dashboard application built for the newznab indexing software (newznab.com)

Installation Instructions

- ensure that the php5-svn module is installed, on ubuntu/debian you can install with 'sudo apt-get install php5-svn'. NewzDash will
  function without this but you will not see version information.
- clone the git repository: 'git clone git@github.com:tssgery/newzdash.git'
- Configure apache or nginx to server newzdash at port of your choosing (I prefer 8080)
- Access NewzDash via your browser at http://hostname:port
- The first time you bring up NewzDash, it will redirect you to the configuration page.
-- You need to specify the directy where NewzNab is installed so that NewzDash can find the NewzNab config.php file


ToDo
- Add authentication to NewzDash, using users stored within newznab
- Add system information (such as memory and cpu consumption, and disk space)
- Enable newzdash version checking and automatic updates

Screens

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-dash.jpg)

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-recent.jpg)

[ScreenShot](https://raw.github.com/tssgery/newzdash/master/screens/unnamed-stats.jpg)

