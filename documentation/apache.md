# Apache HTTP Server

 - - -

## Was ist Apache?

Apache ist der am meißten benutzte Web Server auf der Welt.\
Ein Web-Server ist eine Software, die von einem Web-Host ausgeführt wird, um
zu ermöglichen, dass man die Seite besuchen kann.\
Es verwaltet alle Anfragen und jede Art von Kommunikation.

- - -

## Was sind Virtual Hosts?

Virtual Hosting bedeutet, auf einer Hardware mehrere Server zu hosten.

- - -

## Virtualhost einrichten

### sites-available config:
```apacheconf
<VirtualHost *:80>
ServerAdmin admin@host_example
ServerName dev.internship.com
DocumentRoot /home/azubi/planeo_internship
ErrorLog /var/log/error.log
CustomLog /var/log/access.log combined
</VirtualHost>
```

### Resolve Hostname

in /etc/hosts:
```
127.0.0.1 dev.internship.com
```

- - -






