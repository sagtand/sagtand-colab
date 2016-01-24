# sagtand-colab
Sågtand CoLab is a platform for collecting and distributing idéas and pieces to be able to create new kinds of music.



Se till att ha dessa resurser installerade:
-------------------------------------------

1.  node.js ~v4.2.1

2.  npm

3.  Grunt: `npm install -g grunt-cli`

4.  Bower: `npm install -g bower`

Installera allt
---------------

1.  CD till themes/sagtand-colab (eller dra mappen till terminalen)

2.  Installera alla packages m.m: `npm install && bower install`

3.  Installera foundation: `sudo gem install foundation -V`

4.  Uppdatera foundation: `foundation update`

Kör sass och andra grunt-funktioner
-----------------------------------

1.  `grunt`

Deployment
----------

1.  Installera dploy globalt på din dator `npm install dploy -g`

2.  CD till rooten av detta git repo och installera dploy `dploy install`

3.  Konfigurera dploy.yaml själv eller få en template av kontakta@jonassandstedt.se

4.  Gör `dploy dev`i terminalen eller tagga din comit med samma text Tips: Skriv `dploy stage -i` för att ignora includade filer (ex om du lagt till wp-uploads i include men inte vill ladda upp alla bilder igen eftersom du inte lagt till några bilder där)
