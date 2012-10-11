<?php header("Content-Type: text/xml;"); ?>
<?php printf('<?xml version="1.0" ?>'); ?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" output-encoding="UTF-8" xsi:nonamespaceschemalocation="http://www.netbiscuits.com/schema/netbiscuits.xsd">
    <container>
        <column>
            <LOCATION target="index.php">
                <geocoding provider="google">
                    <key>ABQIAAAASDwvcSMc3Jw4Id8J7gRwahTMYeFj5huilGQKOtkvorAu2VX0QBQTMBUJOxYJc7cbS42Azj477vt4oA</key>
                </geocoding>
                <errors/>
                <autolocate method="gpsjs">
                    <text>Locating your position with your device's GPS...</text>
                    <locationformlink>Enter Manually</locationformlink>
                    <headline>Autolocation by GPS</headline>
                </autolocate>
                <locationform method="POST">
                    <headline>Location Finder</headline>
                    <row>
                        <cell>
                            <text>Your Location:</text>
                        </cell>
                    </row>
                    <row>
                        <cell>
                            <input name="poiAddress" required="true" type="text"/>
                        </cell>
                    </row>
                    <input type="submit" value="Go"/>
                </locationform>
                <disambiguation maxitems="10">
                    <disambiguationtext>Did you mean one of these locations?</disambiguationtext>
                    <locationformlink>Back</locationformlink>
                    <headline>Please Clarify</headline>
                </disambiguation>
            </LOCATION>
        </column>
    </container>
</page>