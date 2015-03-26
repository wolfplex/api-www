Wolfplex API
==========

Space API
---------
[/space](http://api.wolfplex.be/space)

Returns a JSON document compliant with the [Space API](http://spaceapi.net/documentation),
to publish information about the space, and indicate if the space is open or closed.


Pads API
--------
[/pads](http://api.wolfplex.be/pads)

Returns a list of the pads on the Wolfplex Etherpad installation

Parameter:
* format=json|raw|txt (default: json) — Output format

Design API
----------

[/design/kibaone/accents](http://api.wolfplex.be/design/kibaone/accents)

Returns a JSON document with a listing of Kiba One accents.

Format: An array of object, each one having 3 properties:
* name: the accent name
* accent: the background color
* headingColor: the heading color

Homepage
--------
http://api.wolfplex.be/

