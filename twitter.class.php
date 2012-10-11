<?php
class Twitter
{
    public function __construct(){	}

    public function searchQuery( $search = null)
    {
        $url = "http://search.twitter.com/search.rss?q=" . urlencode( $search ) . "&lang=en&rpp=50";

        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        $result = curl_exec( $curl );
        curl_close( $curl );

        $return = new SimpleXMLElement( $result );
        return $return;

        $return = new SimpleXMLElement( $result );
    }

    public function searchGeo( $search = null)
    {
        $url = "http://search.twitter.com/search.rss?geocode=" . $search;

        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        $result = curl_exec( $curl );
        curl_close( $curl );

        $return = new SimpleXMLElement( $result );
        return $return;

        $return = new SimpleXMLElement( $result );
    }
}
?>