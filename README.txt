Email küldő webes alkalmazás


Készítő: Bicskei Dániel
2017



Néhány fontos adat:

A számitógépen melyen a program készült a következő adatok jellemezték:

	-os: 			WIN10 x64
	-server:		XAMPP v3.3.2 (APACHE, mySQL)
	-php version:		7.0
	-keretrendszer:		SYMFONY 3.3.2
	-forráskódszerkesztő:	NOTEPAD++ v7.5.3 && MICROSOFT VS CODE
	-böngésző:		CHROME
	-levelezőrendszer:	GMAIL

Telepítés:
Először is fel kell telepiteni az XAMPP-ot. Másodszor pedig csomagoljuk ki a project mappát és helyezzük a "C:\xampp\htdocs" mappába. Nyissuk meg az XAMPP-ot és az APACHE-t és mySQL-t inditsuk el a "START" gombokkal. Ezután nissuk meg a parancssort és navigáljunk a "C:\xampp\htdocs\project" mappába. Írjuk be a "php bin/console server:run" parancsot. Ezután a böngészőn keresztül elérjük az alkalmazást ha beirjuk az URL-t "http://localhost:8000/"

Adatbázishoz csatlakozás:
Írjuk be a böngészőbe "http://localhost/phpmyadmin/", majd lépjünk be a "root" felhasználónévvel, jelszó nincs. Ezután hozzunk létre egy weboldal adatbázist. 
Frissítsük az adatbázist, irány a parancssor és irjuk be a "C:\xampp\htdocs\project" mappán belül, hogy "php bin/console doctrine:schema:update --force" 

Figyelen az adatbázis nélkül nem működik az App!!!
