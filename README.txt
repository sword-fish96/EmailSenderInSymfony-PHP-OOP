Email k�ld� webes alkalmaz�s


K�sz�t�: Bicskei D�niel
2017



N�h�ny fontos adat:

A sz�mit�g�pen melyen a program k�sz�lt a k�vetkez� adatok jellemezt�k:

	-os: 			WIN10 x64
	-server:		XAMPP v3.3.2 (APACHE, mySQL)
	-php version:		7.0
	-keretrendszer:		SYMFONY 3.3.2
	-forr�sk�dszerkeszt�:	NOTEPAD++ v7.5.3 && MICROSOFT VS CODE
	-b�ng�sz�:		CHROME
	-levelez�rendszer:	GMAIL

Telep�t�s:
El�sz�r is fel kell telepiteni az XAMPP-ot. M�sodszor pedig csomagoljuk ki a project mapp�t �s helyezz�k a "C:\xampp\htdocs" mapp�ba. Nyissuk meg az XAMPP-ot ma az APACHE-t �s mySQL-t inditsuk el a "START" gombokkal. Ezut�n nissuk meg a parancssort �s l�pj�nk bele a "C:\xampp\htdocs\project" mapp�ba. �rjuk be a parancssorba, hogy "php bin/console server:run". Ezut�n a b�ng�sz�n kereszt�l el�rj�k az alkalmaz�st ha beirjuk az URL-t "http://localhost:8000/"

Adatb�zishoz csatlakoz�s:
�rjuk be a b�ng�sz�be "http://localhost/phpmyadmin/", majd l�pj�nk be a "root" felhaszn�l�n�vvel, jelsz� nincs. Ezut�n hozzunk l�tre egy weboldal adatb�zist. 
Friss�ts�k az adatb�zist, ir�ny a parancssor �s irjuk be a "C:\xampp\htdocs\project" mapp�n bel�l, hogy "php bin/console doctrine:schema:update --force" 

Figyelen az adatb�is n�lk�l nem m�k�dik az App!!!
