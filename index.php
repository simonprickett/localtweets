<?php header("Content-Type: text/xml;"); ?>
<?php printf('<?xml version="1.0" ?>'); ?>
<?php
require_once("twitter.class.php");
$Twitter = new Twitter;
$latitude = $_GET["poiLat"];
if (strlen($latitude) == 0) {
    $latitude = "37.781157";
    $longitude = "-122.398720";
    $addr = "Default Location";
} else {
    $addr = $_GET["poiGCAddress"];
    $longitude = $_GET["poiLon"];
}
$searchStr = $latitude . ",". $longitude . ",10mi";
$results = $Twitter->searchGeo($searchStr);
?>
<page paging="true" nocache="false" output-encoding="UTF-8" title="PHP Netbiscuits Demo">  
    <class name="mainheader">
        <style name="bgcolor" value="#FF0000"/>
        <style name="color" value="#FFFFFF"/>
    </class>
    <container>
        <column>
            <TEXT class="mainheader">
                <headline>Geo Results near <?php echo($addr) ?></headline>
                <richtext>[url="geolocate.php"]Change Location[/url]</richtext>
            </TEXT>
            <?php
            foreach( $results->channel->item as $result )
            {
                $imgs = $result->children('http://search.yahoo.com/mrss/');
            ?>
                <TEASER>
                    <img src="<?php echo $imgs->content->attributes()->url ?>"/>
                    <headline><?php echo $result->author ?></headline>
                    <richtext><?php echo strip_tags($result->title) ?></richtext>
                    <link href="<?php echo $result->link ?>"></link>
                </TEASER>
            <?php
            }
            ?>
            <SEPARATOR/>
            <TEXT class="mainheader">
                <headline>Search Query</headline>
            </TEXT>
            <?php
            $results = $Twitter->searchQuery("mobile");

            foreach( $results->channel->item as $result )
            {
                $imgs = $result->children('http://search.yahoo.com/mrss/');
            ?>
                <TEASER>
                    <img src="<?php echo $imgs->content->attributes()->url ?>"/>
                    <headline><?php echo $result->author ?></headline>
                    <richtext><?php echo strip_tags($result->title) ?></richtext>
                    <link href="<?php echo $result->link ?>"></link>
                </TEASER>
            <?php
            }
            ?>
        </column>
    </container>
</page>
