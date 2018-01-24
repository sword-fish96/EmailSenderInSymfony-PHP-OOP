Email küldõ webes alkalmazás


Készítõ: Bicskei Dániel
2017



Néhány fontos adat:

A számitógépen melyen a program készült a következõ adatok jellemezték:

	-os: 			WIN10 x64
	-server:		XAMPP v3.3.2 (APACHE, mySQL)
	-php version:		7.0
	-keretrendszer:		SYMFONY 3.3.2
	-forráskódszerkesztõ:	NOTEPAD++ v7.5.3 && MICROSOFT VS CODE
	-böngészõ:		CHROME
	-levelezõrendszer:	GMAIL

Telepítés:
Elõször is fel kell telepiteni az XAMPP-ot. Másodszor pedig csomagoljuk ki a project mappát és helyezzük a "C:\xampp\htdocs" mappába. Nyissuk meg az XAMPP-ot ma az APACHE-t és mySQL-t inditsuk el a "START" gombokkal. Ezután nissuk meg a parancssort és lépjünk bele a "C:\xampp\htdocs\project" mappába. Írjuk be a parancssorba, hogy "php bin/console server:run". Ezután a böngészõn keresztül elérjük az alkalmazást ha beirjuk az URL-t "http://localhost:8000/"

Adatbázishoz csatlakozás:
Írjuk be a böngészõbe "http://localhost/phpmyadmin/", majd lépjünk be a "root" felhasználónévvel, jelszó nincs. Ezután hozzunk létre egy weboldal adatbázist. 
Frissítsük az adatbázist, irány a parancssor és irjuk be a "C:\xampp\htdocs\project" mappán belül, hogy "php bin/console doctrine:schema:update --force" 

Figyelen az adatbáis nélkül nem mûködik az App!!!
